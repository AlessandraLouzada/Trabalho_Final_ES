<?php
	include_once("../persistence/connection.php");
	include_once("../persistence/hospedeDAO.php");
	
	$cpf = $_POST['cpf'];
	
	// Estabelece conexão com o banco de dados
	$conexao = new connection();
	$conexao->conectar();
	
	$hospededao = new HospedeDao();
	// Manda o cpf recebido no post por parametro para que seja retornado os dados do hospede portador desse cpf
	$res = $hospededao->consultar($cpf, $conexao->getConn());
	
	// Caso retorne alguma linha será exibido os dados do usuario na interface
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
				<th>Nascimento</th>
				<th>Email</th>
			  </tr>";
			  while ($reg = $res->fetch_assoc()){
				  echo "<tr>";
				  echo "<td>".$reg['nome']."</td>".
						"<td>".$reg['cpf']."</td>".
						"<td>".$reg['nasc']."</td>".
						"<td>".$reg['email']."</td>";
				  echo "</tr>";
			  }
			echo "</table>
				  <button id='Alterar' type='button' onclick=\"window.location='http://localhost/trabalho/view/confirmarAlterar.html'\"><font color=white>Alterar</font></button>
				  <button type='button' onclick=\"window.location='http://localhost/trabalho/view/confirmarExclusao.html'\"><font color=white>Excluir</font></button>";
		echo "</div></body></html>";
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
