<?php
class Connection{
	
	
	
	protected function abrirConexao(){
		try {
			$conexao = new PDO('mysql:host=localhost;dbname=to_do_list', 'root', 'root');
			$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e){
			echo 'ERRO: ' . $e->getMessage();
			die();
		}	
		return $conexao;		
	}
	
	protected function fecharConexao($conexao){
		$conexao = null;		
	}	
}
?>
