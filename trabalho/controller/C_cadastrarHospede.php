<?php
	include_once("../model/Hospede.php");
	include_once("../persistence/connection.php");
	include_once("../persistence/hospedeDAO.php");
	
	// Estabelece conexão com o banco de dados
	$conexao = new connection();
	$conexao->conectar();
	
	$cpf = $_POST['cpf'];
	$nome = $_POST['nome'];
	$nasc = $_POST['nasc'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$telefone = $_POST['fone'];
	
	//Instancia um novo hospede
	$hospede = new Hospede($nome, $cpf, $nasc, $email, $senha, $telefone);
	
	
	
	$hospededao = new HospedeDao();
	//Cadastra um novo hospede no banco de dados
	$hospededao->cadastrar($hospede, $conexao->getConn());
?>
