<?php
	include_once("../persistence/connection.php");
	include_once("../persistence/hospedeDAO.php");
	
	$cpf = $_POST['cpf'];
	
	$conexao = new connection();
	$conexao->conectar();
	
	$hospededao = new HospedeDao();
	$res = $hospededao->consultar($cpf, $conexao->getConn());
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
	else {
		echo "<script>alert('CPF inválido')</script>";
		header("Location:../view/conferirCadastro.html ");//????????????????????????????????????????????????????
	}
?>
