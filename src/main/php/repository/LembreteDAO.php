<?php
	require_once __DIR__.'/../util/ConexaoBD.php';
	require_once __DIR__.'/../model/Lembrete.php';
	class LembreteDAO extends Connection{
		
		public function salvar($lembre){
			$lembrete = new Lembrete();
			$lembrete = $lembre;
			try {
					
				$conexao = parent::abrirConexao();
				$sql = "INSERT INTO lembrete (titulo,conteudo) VALUES (:titulo,:conteudo)";
				$stmt = $conexao->prepare($sql);
				$stmt->bindParam(':titulo', $lembrete->titulo);
				$stmt->bindParam(':conteudo', $lembrete->conteudo);				
				$stmt->execute();
					
			} catch (Exception $e) {
				$e->getMessage();
				parent::fecharConexao($conexao);
			}
			parent::fecharConexao($conexao);
		}
		
		public function excluir($id){
			try{
				$conexao = parent::abrirConexao();
				$sql = "DELETE FROM lembrete where id = :id";
				$stmt = $conexao->prepare($sql);
				$stmt->bindParam(':id', $id);
				$stmt->execute();
					
			} catch (Exception $e) {
				$e->getMessage();
				parent::fecharConexao($conexao);
			}
			parent::fecharConexao($conexao);
		}
		
		public function listar(){
			$lembretes = array();
			try {
					
				$conexao = parent::abrirConexao();
				$sql = "SELECT * FROM lembrete";
				$stmt = $conexao->prepare($sql);
				$stmt->execute();
		
				while($lembreteBD = $stmt->fetchObject()){
					$lembrete = new Lembrete();
					$lembrete->titulo = $lembreteBD->titulo;
					$lembrete->conteudo = $lembreteBD->conteudo;
					$lembrete->id = $lembreteBD->id; 
		
					array_push($lembretes, $lembrete);
				}
		
		
			} catch (Exception $e) {
				$e->getMessage();				
				parent::fecharConexao($conexao);
			}
			parent::fecharConexao($conexao);
			return $lembretes;
			
		
		}
	}
?>