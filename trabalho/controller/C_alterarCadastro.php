<?php
	include_once("../persistence/connection.php");
	include_once("../persistence/hospedeDAO.php");
	
	$cpf = $_POST['ccpf'];

	
	$conexao = new connection();
	$conexao->conectar();
	
	
	
	$hospededao = new HospedeDao();
	$res1 = $hospededao->consultar($cpf, $conexao->getConn());
	
	if($res1->num_rows > 0) {
		$reg = $res1->fetch_assoc();
		
		echo "<!DOCTYPE html>
			<html>
				<head>
					<link rel='stylesheet' type ='text/css' href='http://localhost/trabalho/css/cadastro.css'>
					<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
					<meta name='viewport' content='width=device-width, initial-scale=1.0'>
					<title>Vila Nova Hotel</title>
				</head>
				<body>

					<header>
						Vila Nova<br>
						<div id='botao'>
							<button><a href='http://localhost/trabalho/view/homeLogin.html'><font color=white>Home</font></a></button>
							<button><a href='http://localhost/trabalho/view/acomodacao.html'><font color=white>Acomodações</font></a></button>
							<button><a href='http://localhost/trabalho/view/servico.html'><font color=white>Serviços</font></a></button>
							<button><a href='http://localhost/trabalho/view/reserva.html'><font color=white>Reservas</font></a></button>
							<button><a href='http://localhost/trabalho/view/sobre.html'><font color=white>Sobre</font></a></button>
							<button><a href='http://localhost/trabalho/view/conferircadastro.html'><font color=white>Conferir Cadastro</font></a></button>
							<button><a href='http://localhost/trabalho/home.html'><font color=white>Sair</font></a></button>
						</div>
					</header>
					<div id='tabela'>
						<form action='..\controller\C_finalizarAlterar.php' method='POST'>
							Nome: <input type='text' name='nome' value='".$reg['nome']."'><br><br>
							CPF: <input type='txt' name='ncpf' value='".$reg['cpf']."'><br><br>
							Data de Nascimento: <input type='date' name='nasc' value='".$reg['nasc']."'><br><br>
							Email: <input type='email' name='email' value='".$reg['email']."'><br><br>
							Nova senha: <input type='password' name='senha'><br><br>
							Telefone: <input type='tel' name='fone' value='".$reg['telefone']."'pattern='+[0-9]{2}([0-9]{2})[0-9]{4-5}-[0-9]{4}'><br><br>
						
							<input type='submit' value='Enviar dados'>";
					echo "</form></div></body></html>";
	}
	else {
		echo "CPF inválido";
	}


?>
