<?php
	include_once("../model/Hospede.php");
	include_once("../persistence/connection.php");
	include_once("../persistence/hospedeDAO.php");
	
	$conexao = new connection();
	$conexao->conectar();
	
	$cpf = $_POST['cpf'];
	$nome = $_POST['nome'];
	$nasc = $_POST['nasc'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$telefone = $_POST['fone'];
	
	$hospede = new Hospede($nome, $cpf, $nasc, $email, $senha, $telefone);
	
	
	
	$hospededao = new HospedeDao();
	$hospededao->cadastrar($hospede, $conexao->getConn());
?>
