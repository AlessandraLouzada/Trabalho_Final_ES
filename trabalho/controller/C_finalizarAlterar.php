<?php
	include_once("../persistence/connection.php");
	include_once("../persistence/hospedeDAO.php");
	
	$nome = $_POST['nome'];
	$nasc = $_POST['nasc'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$telefone = $_POST['fone'];
	$pcpf = $_POST['ncpf'];

	// Estabelece conexão com o banco de dados
	$conexao = new connection();
	$conexao->conectar();
	
	
	
	$hospededao = new HospedeDao();
	
	//Manda por parametro os dados recebidos no post para que o cdastro do hospede seja alterado
	$res = $hospededao->altera( $nome, $pcpf, $email, $nasc, $telefone, $senha, $conexao->getConn());
	
	//Caso a alteração tenha dado certo exibe uma mensagem de sucesso na interface
	if ($res === TRUE){
		
		echo "<!DOCTYPE html>
	<html>
		<head>
			<link rel='stylesheet' type ='text/css' href='http://localhost/trabalho/css/home.css'>
			<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<title>Vila Nova Hotel</title>
		</head>
		<body>

			<header>
				Vila Nova<br>
				<div id='botao'>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/homeFuncionario.html'\"><font color=white>Home</font></button>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/acomodacaoFuncionario.html'\"><font color=white>Acomodações</font></button>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/servicoFuncionario.html'\"><font color=white>Serviços</font></button>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/reserva.html'\"><font color=white>Reservas</font></button>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/fReservarFuncionario.html'\"><font color=white> Fazer Reserva</font></button>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/sobreFuncionario.html'\"><font color=white>Sobre</font></button>
					<button type='button' onclick=\"window.location='http://localhost/trabalho/view/conferircadastro.html'\"><font color=white>Conferir Cadastro</font></button>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/home.html'\"><font color=white>Sair</font></button>
				</div>
			</header>
			 <div id ='aviso'>
				Alterado com sucesso!
			</div></body></html>";
	}
	//Caso contrario exibe uma mensagem de erro na interface
	else {
		
		echo "<!DOCTYPE html>
	<html>
		<head>
			<link rel='stylesheet' type ='text/css' href='http://localhost/trabalho/css/home.css'>
			<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<title>Vila Nova Hotel</title>
		</head>
		<body>

			<header>
				Vila Nova<br>
				<div id='botao'>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/homeFuncionario.html'\"><font color=white>Home</font></button>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/acomodacaoFuncionario.html'\"><font color=white>Acomodações</font></button>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/servicoFuncionario.html'\"><font color=white>Serviços</font></button>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/reserva.html'\"><font color=white>Reservas</font></button>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/fReservarFuncionario.html'\"><font color=white> Fazer Reserva</font></button>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/sobreFuncionario.html'\"><font color=white>Sobre</font></button>
					<button type='button' onclick=\"window.location='http://localhost/trabalho/view/conferircadastro.html'\"><font color=white>Conferir Cadastro</font></button>
					<button	type='button' onclick=\"window.location='http://localhost/trabalho/home.html'\"><font color=white>Sair</font></button>
				</div>
			</header>
			 <div id ='aviso'>
				Erro na alteração". $conexao->getConn()->error;
			echo "</div></body></html>";
	}

?>
