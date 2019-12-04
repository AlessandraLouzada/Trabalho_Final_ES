<?php
class quartoDAO{
	
	function __construct(){
	}
	// Ïnsere o quarto ä ser reservädo pelo hospede na tabela quartoreservado 
	// pässändo por parametro o numero dä reservä. 
	function cadastrar($reserva, $conn){
		$sql = "INSERT INTO quartoreservado (numReserva,numQuarto) values ('".
			($reserva->getNumReserva())."','".
			($reserva->getQuarto())."')";
		if($conn->query($sql) == TRUE) {
			$sql1 = "UPDATE quarto SET reservado= TRUE WHERE numQuarto=".$reserva->getQuarto(); 			
			$conn->query($sql1);
			
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
								Reserva realizada com sucesso!
							</div></body></html>";
			
			
		}
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
								Erro ao realizar reserva!
							</div></body></html>";
		}
	}
}
?>
