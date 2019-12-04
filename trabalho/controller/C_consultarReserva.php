<?php
	include_once("../persistence/connection.php");
	include_once("../persistence/reservaDAO.php");
	include_once("../persistence/hospedeDAO.php");
	
	$cpf = $_POST['cpf'];
	
	// Estabelece conexão com o banco de dados
	$conexao = new connection();
	$conexao->conectar();
	
	$hospededao = new HospedeDao();
	// Manda o cpf recebido no post por parametro para verificar se existe cadastrado no banco de dados
	$resC = $hospededao->consultar($cpf, $conexao->getConn());
	
	// Caso retorne alguma linha será verificado se existe uma reserva cadastrada no cpf
	if($resC->num_rows > 0){
		
		$reservadao = new ReservaDAO();
		// Manda o cpf recebido no post por parametro para verificar os dados das reservas feitas nesse cpf
		$res = $reservadao->consultar($cpf, $conexao->getConn());
		
		// Caso retorne alguma linha será exibido os dados das reserva na interface
		if($res->num_rows > 0){
			
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
			<div id='tabela'>
			
				<table>
				  <tr>
					<th>Nome</th>
					<th>CPF</th>
					<th>Numero Reserva</th>
					<th>Data Entrada</th>
					<th>Data Saida</th>
					<th>Numero Quarto</th>
					<th>Tipo Quarto </th>
					<th>Serviço</th>
				  </tr>";
				  while ($reg = $res->fetch_assoc()){
					  echo "<tr>";
					  echo "<td>".$reg['nome']."</td>".
							"<td>".$reg['cpf']."</td>".
							"<td>".$reg['numReserva']."</td>".
							"<td>".$reg['dataEntrada']."</td>".
							"<td>".$reg['dataSaida']."</td>".
							"<td>".$reg['numQuarto']."</td>".
							"<td>".$reg['tipoQuarto']."</td>".
							"<td>".$reg['tipoServico']."</td>";
					  echo "</tr>";
				  }
				echo "</table>
					  <button id='Alterar' type='button' onclick=\"window.location='http://localhost/trabalho/view/confirmarAlterarReserva.html'\"><font color=white>Alterar</font></button>
					  <button type='button' onclick=\"window.location='http://localhost/trabalho/view/confirmarExclusaoReserva.html'\"><font color=white>Excluir</font></button>";
			echo "</div></body></html>";
		}
		//Caso não haja nenhuma reserva nesse cpf será exibido um erro na interface
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
				CPF não contém reservas cadastradas!
			</div></body></html>";
		}
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
								CPF invalido!
							</div></body></html>";
		}
?>
