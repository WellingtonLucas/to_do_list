<!DOCTYPE html>
<?php 
	require_once __DIR__.'/../service/LembreteService.php';	
	session_start();
	$service = new LembreteService();
	
	if(isset($_POST['excluir'])){
		$service->excluir($_POST['excluir']);
	}
	
	$lembretes = $service->listar();	
	
	if(isset($_POST['titulo']) && isset($_POST['conteudo'])){
		$titulo = $_POST['titulo'];
		$conteudo = $_POST['conteudo'];
		$service->salvar($titulo, $conteudo);						
	}
	$lembretes = $service->listar();
?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" href="../../resources/imagens/logo_ufc.png" type="image/png" sizes="16x16">
		<link rel="stylesheet" href="../../resources/css/bootstrap-3.3.2-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../resources/css/to-do-list.css">
		<script type="text/javascript" src="../../resources/jquery/jQuery.js"> </script>
		<script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
		
		
		<title>TO-DO list</title>
	</head>
	<body>	
		<div class="container">
			<div class="header">
		    	<nav>
			        <ul class="nav nav-pills pull-right">
			            <li role="presentation" class="active">
				            <button type="button" class="btn btn-primary" data-toggle="modal" 
				            data-target="#modal" data-whatever="@mdo">Novo Lembrete</button>			            
			            </li>				            		            
		          	</ul>
		        </nav>
		        <h3 class="text-muted">TO-DO List</h3>
		    </div>	
		    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="exampleModalLabel">Novo Lembrete</h4>
			      </div>
			     
			      <div class="modal-body">
			      
			        <form action="index.php" method="post">
			          <div class="form-group">
			           
			            <label for="titulo" class="control-label">Título:</label>
			            <input type="text" class="form-control" id="titulo" name="titulo">
			          
			          </div>
			          <div class="form-group">
			          
			            <label for="conteudo" class="control-label">Conteúdo:</label>
			            <textarea class="form-control" id="conteudo" name="conteudo"></textarea>
			          
			          </div>
			          
			          <div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			        	<button type="submit" class="btn btn-primary">Adicionar</button>
			      	  </div>
			        </form>
			        
			      </div>
			      <!--<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			        <button type="button" class="btn btn-primary">Adicionar</button>
			      </div>-->
			    </div>
			  </div>
			</div>
		    <?php if(!empty($lembretes)){?>
		    
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
			 <?php for ($i = count($lembretes)-1; $i>=0; $i--){?>
			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="heading<?php echo $i ?>">
			      <h4 class="panel-title">
			        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i ?>" aria-expanded="true" aria-controls="collapse<?php echo $i ?>">
			          <?php echo $lembretes[$i]->titulo?>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse<?php echo $i ?>" class="panel-collapse collapse"  role="tabpanel" aria-labelledby="heading<?php echo $i ?>">
			      <div class="panel-body">
			      	<?php echo $lembretes[$i]->conteudo?>  
			      	<form action="index.php" method="post">
			      		<div class="footer">
			      			<input type="hidden" name="excluir" value ="<?php echo $lembretes[$i]->id?>"/>
			      			<button type="submit" class="btn btn-danger">Excluir</button>
			      		</div>
			      	</form>
			      </div>
			    </div>
			  </div>
			 <?php } ?>			  
			</div>	
			<?php }?>
			
			<footer class="footer">
	        	<p>&copy; Wellington; Fernanda; Paulo.</p>
	      	</footer>
      	</div>
	</body>
</html>
	
