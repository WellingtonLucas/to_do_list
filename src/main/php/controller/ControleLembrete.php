<?php
	require_once __DIR__.'/../repository/LembreteDAO.php';
	
	class ControleLembrete{		
		public function buscarLista(){
			$lembreteDAO = new LembreteDAO();
			return $lembreteDAO->listar();
		} 
		public function salvar($lembrete){
			$lembreteDAO = new LembreteDAO();
			$lembreteDAO->salvar($lembrete);
		}
		public function excluir($id){
			$lembreteDAO = new LembreteDAO();
			$lembreteDAO->excluir($id);
		}
		
	}
?>