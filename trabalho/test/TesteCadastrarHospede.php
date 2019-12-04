<?php

	require_once('trabalho\model\Hospede.php');
	require_once('trabalho\persistence\HospedeDAO.php');
	require_once('trabalho\persistence\connection.php');

	class TestCadastrarHospede extends PHPUnit\Framework\TestCase{
		
		public function testInserirHospede(){
			$objConn = new connection();
			$objConn->conectar();
			$conn = $objConn->getConn();
			
			$obj = new Hospede("Ynara", "11501250689", "1999/10/18", "ynara@gmail.com", "senha123", "37998741853");
			$objHosp = new hospedeDAO();
			$objHosp->cadastrar($obj, $conn);
			
			$res = $conn->query("SELECT nome, cpf, nasc, email, senha, telefone FROM hospede WHERE cpf='11501250689'");
			$reg = $res->fetch_assoc();

			$this->assertEquals("Ynara", $reg['nome'], "Nome errado");
			$this->assertEquals("11501250689", $reg['cpf'], "CPF errado");
			$this->assertEquals("1999-10-18", $reg['nasc'], "Data de nascimento errada");
			$this->assertEquals("ynara@gmail.com", $reg['email'], "Email errado");
			$this->assertEquals("senha123", $reg['senha'], "Senha errada");
			$this->assertEquals("37998741853", $reg['telefone'], "Telefone errado");
		}
	}
?>
