
<!DOCTYPE html>
<?php 
	@session_start();
	$lista_titulos = array();
	$lista_lembretes = array();
	$tag = FALSE;
	if(isset($_SESSION['TITULOS']) && isset($_SESSION['LEMBRETE'])){
		if(isset($_POST['titulo']) && isset($_POST['conteudo'])){		
			$lista_lembretes = $_SESSION['LEMBRETE'];
			$lista_titulos = $_SESSION['TITULOS'];
			array_push($lista_lembretes, $_POST['conteudo']);
			array_push($lista_titulos, $_POST['titulo']);
			$_SESSION['LEMBRETE'] = $lista_lembretes;
			$_SESSION['TITULOS'] = $lista_titulos;
		}else{
			$lista_lembretes = $_SESSION['LEMBRETE'];
			$lista_titulos = $_SESSION['TITULOS'];
		}
		$tag = TRUE;
	}
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
			          <button type="submit" class="btn btn-primary">Adicionar</button>
			        </form>
			        
			      </div>
			      <!--<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			        <button type="button" class="btn btn-primary">Adicionar</button>
			      </div>-->
			    </div>
			  </div>
			</div>
		    <?php if($tag){?>
		    
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			 <?php for ($i = count($lista_titulos)-1; $i>=0; $i--){?>
			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingOne">
			      <h4 class="panel-title">
			        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			          <?php echo $lista_titulos[$i]?>
			        </a>
			      </h4>
			    </div>
			    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			      <div class="panel-body">
			      	<?php echo $lista_lembretes[$i]?>  
			      </div>
			    </div>
			  </div>
			 <?php } ?>			  
			</div>	
			<?php }?>
			
			<footer class="footer">
	        	<p>&copy; UFC-Quixadá</p>
	      	</footer>
      	</div>
	</body>
</html>
	
