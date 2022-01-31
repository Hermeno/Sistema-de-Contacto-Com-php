<?php  session_start(); 
$con = new PDO("mysql:host=localhost; dbname=empresa","root","");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Contacto</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="">
	<style>
		*{
			padding: 0;
			margin: 0; 
		}
		.col-md-8 {
			height: 60px;
			margin-top: 20px;
		}
		.linhas{
			display: flex;
			justify-content: space-evenly;
			gap: 5px;
		}
		@media(max-width: 500px) {
					.linhas{
						display: grid;
						margin: 20px;
					}
		}
		h5 strong {
			margin: 5px 5px 20px 5px;
		}
		.div_pesqui  {
			width: 340px;
			border: 1px solid #ccc;
			height: 40px;
			display: flex;
			justify-content: flex-start;
			gap: 10px;
			border-radius: 6px;
		}
		.div_pesqui button{
			background-color: transparent;
			border: transparent;
		}
		.div_pesqui .input-control {
			width: 300px;
			border-right:  1px solid #ccc;
			border-bottom: transparent;
			border-left: transparent;
			border-top: transparent;
			border-bottom-left-radius: 6px;
			border-top-left-radius: 6px;
		}
		.link_del{
			width: 20px;
			margin-left: 15px;
			color: red;
			text-decoration: none;
		}
	</style>
</head>
<body>
	  <nav class="navbar navbar-dark bg-primary text-center">
      <span class="navbar-brand mb-0 h1 text-center">Formulario do contacto</span>
    </nav>
    <br>
	<div align="center">
    <?php 
         if(isset($_SESSION['success'])){
         		echo $_SESSION['success'] ."<a href='delete.php' class='link_del'>x</a>";
         }
	  ?>  
	</div>
	
	<section id="container" >
		<div align="center">
			<div class="col-lg-12">
				<div class="linhas">
				<div class="col-md-4">
					<?php  if(isset($_GET['edit'])) { 
					  $edite = $_GET['edit'];
					  $_GET['edit'] = $edite;
					  $sql = "SELECT * FROM usuarios WHERE id = '$edite'";
					  $cmd = $con->prepare($sql);
					  $cmd->execute();
					  if ($cmd->rowCount() > 0) {
					    foreach ($cmd->fetchAll() as $key) { 
					        $id = $key['id'];
					        $nome = $key['nome'];
					        $empresa = $key['empresa'];
					        $contacto = $key['contacto'];
					      }

					   }
					}
					 ?>
					 <?php
					 if(isset($edite)) {
					 	   ?><form method="POST" action="process.php?get=<?php echo $id; ?>" id="form-id"><?php
					 		}else{ ?>
					 			<form method="POST" action="process.php" id="form-id">
					 	<?php
					 } 
					 ?>
					 <h5><strong>Cadastro de contacto</strong></h5>
						<div class="form-group">
							<label for="nome">Nome</label>
								<?php if(isset($edite)){ ?>
		          		<input type="text" name="nome" id="nome" class="form-control"  value="<?php echo $nome; ?>" required>
										<?php }else{ ?>
									<input type="text" name="nome" id="nome" class="form-control"  required placeholder="nome">
		          	<?php } ?>
						</div>

						<div class="form-group">
							<label for="Empresa">Empresa</label>
							<?php if(isset($edite)){ ?>
		          	<input type="text" name="empresa" id="empresa" class="form-control"  value="<?php echo $empresa; ?>" required>
									<?php }else{ ?>
								<input type="text" name="empresa" id="empresa" class="form-control"  required placeholder="Empresa">
		          <?php } ?>
						</div>

						<div class="form-group">
							<label for="Contacto">Contacto</label>
							<?php if(isset($edite)){ ?>
		         	 <input type="text" name="contacto" id="contacto" class="form-control"  value="<?php echo $contacto; ?>" required>
									<?php }else{ ?>
								<input type="text" name="contacto" id="contacto" class="form-control"  required placeholder="Contacto" accept=".number">
		          <?php } ?>
						</div>

						<div class="form-group">
							<?php if(isset($edite)){ ?>
		          	<input type="submit" name="editing" class="btn btn-primary form-control mt-2" value="Editar" >
									<?php }else{ ?>
								<input type="submit" name="add" class="btn btn-primary form-control mt-2" value="Cadastrar" >
		          <?php } ?>
						</div>
					</form>
				</div>
				<div class="col-md-6" style="margin: 10px 22px 10px 10px ">
					<table class="table">
						<form method="POST">
							<div  class="col-md-10 mb-2">
							    <div class="div_pesqui"><input type="text" name="nome" class="input-control" placeholder="   Pesquisar por nome"><button name="pesqui"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
									  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
									</svg></button>
								</div>
						    </div>
						</form>
						<thead>
							<th>Id</th>
									<th>Nome</th>
										<th>Empresa</th>
										<th>Contacto</th>
									<th>Acao</th>
						</thead>
						<?php 
						 $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); 
    				 if(isset($_POST['pesqui'])) {
    					 $sql = ("SELECT * FROM usuarios WHERE nome LIKE '$nome%' ORDER BY id DESC");
    					   $cmd = $con->prepare($sql);
    	      	      }else{
    	  			   $sql = "SELECT * FROM usuarios ORDER BY id DESC ";
    	  			   $cmd = $con->prepare($sql);
    				 } 
			 		 	$cmd->execute();
			 		 	if($cmd->rowCount() > 0 ) { $results = $cmd->fetchAll();
					 	 foreach($results as $row) { ?>
								<tbody>					 	 	
									<td><?php echo $row['id'];  ?></td>
										<td><?php echo ucfirst($row['nome']);  ?></td>
											<td><?php echo $row['empresa'];  ?></td>
										<td><?php echo $row['contacto'];  ?></td>
									<td>
		                 <a href="index.php?edit=<?php echo $row['id']; ?>" id="stot_popo" class="btn btn-success">
		                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 576 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/>
		                    </svg>
		                 </a>
		                  <a href="process.php?delete=<?php echo $row['id']; ?>" id="stot_toto"  class="btn btn-danger">
		                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
											  <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
											  </svg>
		                  </a>
		              </td>
								</tbody>
						<?php }}  ?>
					</table>
				</div>
			   </div>
			</div>
		</div>
	</section>
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/js.js"></script>
</body>
</html>