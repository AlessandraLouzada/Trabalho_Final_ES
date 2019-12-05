<!-- Faz inserção dos dados recebidos no post em 3 tabelas -->
<?php
	include_once("../model/Reserva.php");
	include_once("../model/ServicoContratado.php");
	include_once("../model/QuartoReservado.php");
	include_once("../persistence/connection.php");
	include_once("../persistence/reservaDAO.php");
	include_once("../persistence/quartoDAO.php");
	include_once("../persistence/hospedeDAO.php");
	include_once("../persistence/servContratadoDAO.php");

	$dataEnt = $_POST['entrada'];
	$dataSai = $_POST['saida'];
	$servicos = $_POST['servico'];
	$quarto = $_POST['quarto'];
	$cpf = $_POST['cpf'];
	
	// Fäz ä conexão com o bänco de dädos	
	$conexao = new connection();
	$conexao->conectar();
	
	$hospededao = new HospedeDao();
	// Manda o cpf recebido no post por parametro para conferir se existe algum hospede cadastrado com esse cpf
	$res1 = $hospededao->consultar($cpf, $conexao->getConn());
	
	// Caso retorne alguma linha será permitido fazer a reserva
	if($res1->num_rows > 0){
			$reservadao = new ReservaDao();
			// Busca um quarto disponivel do tipo e nas datas que o hospede escolheu
			$numQuarto = $reservadao->qDisponivel($quarto, $dataEnt, $dataSai,$conexao->getConn());
			$res = $numQuarto->fetch_assoc();
			
			// Caso haja acomodações disponiveis do tipo escolhido
			if($res['numQuarto'] > 0) {
				$reservar = new Reserva($dataEnt, $dataSai, $cpf);
				// Cadastra na tabela reservar
				$reservadao->realizar($reservar, $conexao->getConn());
				
				// Consulta o numero da reserva
				$numReserva = $reservadao->numeReserva($dataEnt, $cpf, $conexao->getConn());
				
				if($reg = $numReserva->fetch_assoc()){
					$reserva =  $reg['numReserva'];
						// Instancia um novo Servico Contratado
						$resServico = new ServicoContratado($reserva, $servicos);
						$servicodao = new ServicoDao();
						// Cadastra os dados na tabela servicocontratado
						$servicodao->cadastrar($resServico, $conexao->getConn());
						// Instancia um novo Quarto Reservado
						$resQuarto = new QuartoReservado($reserva, $res['numQuarto']);
						$quartodao = new quartoDAO();
						// Cadastra os dados na tabela quartoreservado
						$quartodao->cadastrar($resQuarto, $conexao->getConn());
						
					}
			}
			// Caso não haja acomodações disponiveis do tipo escolhido
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
								Não há acomodações disponiveis do tipo escolhido!
				</div></body></html>";
			}
		}
		// Caso não retorne alguma linha não será permitido fazer a reserva
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
							Cpf invalido!
				</div></body></html>";
		}

?>
