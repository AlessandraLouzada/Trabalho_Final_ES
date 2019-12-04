<?php
	include_once("../persistence/connection.php");
	include_once("../persistence/reservaDAO.php");
	
	$reserva = $_POST['res'];
	
	// Estabelece conexão com o banco de dados
	$conexao = new connection();
	$conexao->conectar();
	
	
	
	$reservadao = new ReservaDAO();
	// Manda a reserva recebida no post por parametro para que seja retornado os dados da reserva
	$res1 = $reservadao->consultarReserva($reserva, $conexao->getConn());
	
	// Caso retorne alguma linha será exibido os dados da reserva a ser alterada na interface
	if($res1->num_rows > 0) {
		$reg = $res1->fetch_assoc();
		
		echo "<!DOCTYPE html>
			<html>
				<head>
					<link rel='stylesheet' type ='text/css' href='http://localhost/trabalho/css/fReservar.css'>
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
					<form  action='..\controller\C_finalizarAltReserva.php' method='POST'>
					<div id = 'tabela'>";
						echo "Hospede: ".$reg['nome'];
						echo "<br>Numero reserva: <input type='res' name='numReserva' value='".$reg['numReserva']."' readonly>";
					echo "</div>
						<div id = 'box'>
								Data de Entrada: <input type='date' name='entrada' value='".$reg['dataEntrada']."'> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
								Data Saida: <input type='date' name='saida'  value='".$reg['dataSaida']."'> <br><br>
								Serviços:<br>";
									if($reg['idServico']==1){ 
										echo "<input type='radio' name='servico' value='1' checked> Pacote 1 (Centro fitness e Restaurante (R$225/dia)) <br>
											<input type='radio' name='servico' value='2'> Pacote 2 (Centro fitness e SPA (R$250/dia)) <br>
											<input type='radio' name='servico' value='3' > Pacote 3 (Restaurante e SPA(R$300/dia)) <br>
											<input type='radio' name='servico' value='4' > Pacote 4 (Restaurante, Centro fitness e SPA(R$300/dia)) <br><br>";
									}
									if($reg['idServico']==2){ 
										echo "<input type='radio' name='servico' value='1'> Pacote 1 (Centro fitness e Restaurante (R$225/dia)) <br>
											<input type='radio' name='servico' value='2' checked> Pacote 2 (Centro fitness e SPA (R$250/dia)) <br>
											<input type='radio' name='servico' value='3' > Pacote 3 (Restaurante e SPA(R$300/dia)) <br>
											<input type='radio' name='servico' value='4' > Pacote 4 (Restaurante, Centro fitness e SPA(R$300/dia)) <br><br>";
									}
									if($reg['idServico']==3){ 
										echo "<input type='radio' name='servico' value='1'> Pacote 1 (Centro fitness e Restaurante (R$225/dia)) <br>
											<input type='radio' name='servico' value='2'> Pacote 2 (Centro fitness e SPA (R$250/dia)) <br>
											<input type='radio' name='servico' value='3'checked> Pacote 3 (Restaurante e SPA(R$300/dia)) <br>
											<input type='radio' name='servico' value='4' > Pacote 4 (Restaurante, Centro fitness e SPA(R$300/dia)) <br><br>";
									}
									if($reg['idServico']==4){ 
										echo "<input type='radio' name='servico' value='1'> Pacote 1 (Centro fitness e Restaurante (R$225/dia)) <br>
											<input type='radio' name='servico' value='2'> Pacote 2 (Centro fitness e SPA (R$250/dia)) <br>
											<input type='radio' name='servico' value='3'> Pacote 3 (Restaurante e SPA(R$300/dia)) <br>
											<input type='radio' name='servico' value='4'checked> Pacote 4 (Restaurante, Centro fitness e SPA(R$300/dia)) <br><br>";
									}
								echo "Tipo Quarto:<br>";
									if($reg['tipoQuarto']=="Contemporanea"){
										echo "<input type='radio' name='quarto' value='cont' checked> Contemporanea (R$958/dia) <br>
											<input type='radio' name='quarto' value='luxo'> Luxo (R$2186/dia) <br>
											<input type='radio' name='quarto' value='pres' > Presidencial(R$3891/dia) <br><br>";
									}
									if($reg['tipoQuarto']=="Luxo"){
										echo "<input type='radio' name='quarto' value='cont'> Contemporanea (R$958/dia) <br>
											<input type='radio' name='quarto' value='luxo' checked> Luxo (R$2186/dia) <br>
											<input type='radio' name='quarto' value='pres' > Presidencial(R$3891/dia) <br><br>";
									}
									if($reg['tipoQuarto']=="Presidencial"){
										echo "<input type='radio' name='quarto' value='cont'> Contemporanea (R$958/dia) <br>
											<input type='radio' name='quarto' value='luxo'> Luxo (R$2186/dia) <br>
											<input type='radio' name='quarto' value='pres' checked> Presidencial(R$3891/dia) <br><br>";
									}
									
								echo "CPF cadastrado: <input type='txt' name='cpf' value='".$reg['cpf']."' maxlength='11' readonly> <br><br>	  
								
								<div id='botao'>
									<input type='submit' value='Alterar'>
								</div>";
					echo "</div></form></body></html>";
	}
	// Caso não retorne nenhuma linha será exibido um erro na interface
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
								Número de reserva inexistente!
							</div></body></html>";
	}


?>
