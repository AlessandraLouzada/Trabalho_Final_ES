<?php

	require_once('trabalho\model\Hospede.php');
	require_once('trabalho\persistence\HospedeDAO.php');
	require_once('trabalho\persistence\connection.php');

	class TesteAlterarHospede extends PHPUnit\Framework\TestCase{
		
		public function testInserirHospede(){
			$objConn = new connection();
			$objConn->conectar();
			$conn = $objConn->getConn();
			
			$objHosp = new hospedeDAO();
			$objHosp->altera("Ynara de Faria", "11501250689", "ynaraFaria@gmail.com", "1999-10-18", "37998741853", "senha12", $conn);
			
			$res = $conn->query("SELECT nome, cpf, nasc, email, senha, telefone FROM hospede WHERE cpf='11501250689'");
			$reg = $res->fetch_assoc();

			$this->assertEquals("Ynara de Faria", $reg['nome'], "Nome errado");
			$this->assertEquals("11501250689", $reg['cpf'], "CPF errado");
			$this->assertEquals("1999-10-18", $reg['nasc'], "Data de nascimento errada");
			$this->assertEquals("ynaraFaria@gmail.com", $reg['email'], "Email errado");
			$this->assertEquals("senha12", $reg['senha'], "Senha errada");
			$this->assertEquals("37998741853", $reg['telefone'], "Telefone errado");
		}
	}
?>
