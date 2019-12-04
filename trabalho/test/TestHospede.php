<?php

	require_once('trabalho\model\Hospede.php');
	
	class TestHospede extends PHPUnit\Framework\TestCase{
		
		public function testConstrutor(){
			$obj = new Hospede("Ynara", "11501250689", "1999/10/18", "ynara@gmail.com", "senha", "37998741853");
			$this->assertEquals("Ynara", $obj->getNome(), "Nome errado");
			$this->assertEquals("11501250689", $obj->getCpf(), "CPF errado");
			$this->assertEquals("1999/10/18", $obj->getNasc(), "Data de nascimento errada");
			$this->assertEquals("ynara@gmail.com", $obj->getEmail(), "Email errado");
			$this->assertEquals("senha", $obj->getSenha(), "Senha errada");
			$this->assertEquals("37998741853", $obj->getTelefone(), "Telefone errado");
		}
	}
?>
