<?php
	include_once("../persistence/loginDAO.php");
	include_once("../persistence/connection.php");
	
	$conexao = new connection();
	$conexao->conectar();
	
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	
	$logindao = new loginDao();
	$resultado = $logindao->validar($email, $senha, $conexao->getConn());
	
	if($resultado->num_rows>0){
		if($email === "funcionarioVila@gmail.com"){
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
					
					<h2>
						Vila Nova<br>
						O primeiro 5 estrelas de Lavras,<br> 
						nosso Hotel é reconhecido pelo conforto e excelente <br>
						atendimento. Possui toda a infraestrutura para receber você<br> 
						em sua viagem  seja ela de lazer ou negócios.<br>
					</h2>
					
					<div id='planoPer'>
						O Hotel Vila Nova tem um<br>
						plano  pensado<br>
						especialmente para você.<br><br>
						<button><a href='http://www.ufla.br'><font color=white>Ver Plano</font></a></button>
					</div>
					
					<div id='comentario'>
						Comentários<br><br>
						<button type='button' onclick=\"window.location='http://localhost/trabalho/view/comentar.html'\"><font color=white>Comentar</font></button>
					</div>		
				</body>
			</html>";
		}
		else{
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
							<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/homeLogin.html'\"><font color=white>Home</font></button>
							<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/acomodacaoLogin.html'\"><font color=white>Acomodações</font></button>
							<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/servicoLogin.html'\"><font color=white>Serviços</font></button>
							<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/reserva.html'\"><font color=white>Reservas</font></button>
							<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/fReservar.html'\"><font color=white> Fazer Reserva</font></button>
							<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/sobreLogin.html'\"><font color=white>Sobre</font></button>
							<button	type='button' onclick=\"window.location='http://localhost/trabalho/home.html'\"><font color=white>Sair</font></button>
						</div>
					</header>
					
					<h2>
						Vila Nova<br>
						O primeiro 5 estrelas de Lavras,<br> 
						nosso Hotel é reconhecido pelo conforto e excelente <br>
						atendimento. Possui toda a infraestrutura para receber você<br> 
						em sua viagem  seja ela de lazer ou negócios.<br>
					</h2>
					
					<div id='planoPer'>
						O Hotel Vila Nova tem um<br>
						plano  pensado<br>
						especialmente para você.<br><br>
						<button><a href='http://www.ufla.br'><font color=white>Ver Plano</font></a></button>
					</div>
					
					<div id='comentario'>
						Comentários<br><br>
						<button><a href='file:///C:/xampp/htdocs/trabalho/comentar.html'><font color=white>Comentar</font></a></button>
					</div>		
				</body>
			</html>";
		}
	}
	else{
		
	}
?>
