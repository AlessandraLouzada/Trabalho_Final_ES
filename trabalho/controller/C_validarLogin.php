<?php
	include_once("../persistence/loginDAO.php");
	include_once("../persistence/connection.php");
	
	// Estabelece conexão com o banco de dados
	$conexao = new connection();
	$conexao->conectar();
	
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	
	$logindao = new loginDao();
	// Verifica se o email e a senha recidos no post são validos
	$resultado = $logindao->validar($email, $senha, $conexao->getConn());
	
	// Caso forem validos
	if($resultado->num_rows>0){
		// Se o email for do funcionario do hotel será exibido a interface do funcionario
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
					<div id='aviso'>
						Cadastrar novo hospede<br><br>
						<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/cadastroFuncionario.html'\"><font color=white>Cadastrar</font></button>
					</div>
				</body>
			</html>";
		}
		// Se o email for de algum do hotel será exibido a interface do hospede
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
	
				</body>
			</html>";
		}
	}
	// Caso o email e a senha não forem validos é exibido uma mensagem de erro
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
							<button	type='button' onclick=\"window.location='http://localhost/trabalho/home.html'\"><font color=white>Home</font></a></button>
							<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/acomodacao.html'\"><font color=white>Acomodações</font></a></button>
							<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/servico.html'\"><font color=white>Serviços</font></a></button>
							<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/sobre.html'\"><font color=white>Sobre</font></a></button>
							<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/login.html'\"><font color=white>Login</font></a></button>
						</div>
					</header>
					<div id='aviso'>
						Dados invalidos<br><br>
					</div>
				</body>
			</html>";
	}
?>
