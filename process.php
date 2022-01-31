<?php 
session_start(); 
$con = new PDO("mysql:host=localhost; dbname=empresa","root","");
if(isset($_POST['add'])) {
	$nome = $_POST['nome'];
	$empresa = $_POST['empresa'];
	$contacto = $_POST['contacto'];
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
	$contacto = filter_input(INPUT_POST, 'contacto', FILTER_SANITIZE_STRING);
	if(!empty($contacto)) {
		if(!empty($nome)) {
			if(!empty($empresa)) {
			   $sql = "INSERT INTO usuarios (nome, empresa, contacto, data) VALUES (?,?,?, NOW())";
				$cmd = $con->prepare($sql);
				$cmd->bindVAlue(1, $nome);
				$cmd->bindVAlue(2, $empresa);
				$cmd->bindVAlue(3, $contacto);
				$cmd->execute();
			if(isset($cmd) > 0) {
			  	header("location: index.php");
			  	$_SESSION['success'] = "Cadastrado com sucesso";				
			}
		    }else{
		  	header("location: index.php");
		  	$_SESSION['success'] = "Preencha o campo empresa";
		  }
		}else{
			header("location: index.php");
			$_SESSION['success'] = "Escreva o nome";
		}
	}else{
		header("location: index.php");
		$_SESSION['success'] = "Escrever O contacto";
   }
}
//-----------------------------------------this is a place of delete----------------------
if(isset($_GET['delete'])) {
   $dels = $_GET['delete'];
   $sql = "DELETE FROM usuarios WHERE id = ? ";
   $cmds = $con->prepare($sql);
   $cmds->bindVAlue(1, $dels);
   $cmds->execute();
   if(isset($cmds) > 0) {
   	$_SESSION['success'] = "Usuario eliminado!";
   	 header("location: index.php");
   }
}
//-----------------------------------------this is a place of update----------------------
if(isset($_POST['editing'])) {
	if(isset($_GET['get'])) {
	  $edite = $_GET['get'];
	}
	 $nome = $_POST['nome'];
	 $empresa = $_POST['empresa'];
	 $contacto = $_POST['contacto'];
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
	$contacto = filter_input(INPUT_POST, 'contacto', FILTER_SANITIZE_STRING);
	$sql = "UPDATE  usuarios set nome = ?, empresa = ?, contacto = ? WHERE id = '$edite' ";
	$stmt = $con->prepare($sql);
	$stmt->bindVAlue(1, $nome);
	$stmt->bindVAlue(2, $empresa);
	$stmt->bindVAlue(3, $contacto);
	$stmt->execute();
	if(isset($stmt) > 0){
	$_SESSION['success'] = "Dados editados!";
	header("location: index.php");
	}

}

