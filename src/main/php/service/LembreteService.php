<?php
	require_once __DIR__.'/../controller/ControleLembrete.php';
	require_once __DIR__.'/../model/Lembrete.php';
	class LembreteService{
		
		public function listar(){
			$controle = new ControleLembrete();
			return $controle->buscarLista();
		}
		
		public function salvar($titulo, $conteudo){
			if($this->campoVazio($titulo, $conteudo)){				
				
				$lembrete = new Lembrete();
				$lembrete->titulo = $titulo;
				$lembrete->conteudo = $conteudo;
				if($this->verificaRepeticao($titulo, $conteudo)){
					
					$controle = new ControleLembrete();
					$controle->salvar($lembrete);
				}
			}
		}
		
		public function excluir($id){
			$controle = new ControleLembrete();
			$controle->excluir($id);
		}
		
		public function campoVazio($titulo, $conteudo){
			if(empty($titulo) || empty($conteudo)){
				return FALSE;
			}
			return TRUE;
		}
		
		public function verificaRepeticao($titulo, $conteudo){
			$lista = $this->listar();
			if(empty($lista)){
				return TRUE;
			}			
			else if($lista[count($lista)-1]->titulo!=$titulo && $lista[count($lista)-1]->conteudo!=$conteudo){
				return TRUE;
			}
			return FALSE;
		}
		
	}

?>