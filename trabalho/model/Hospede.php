<?php
// Ïnstänciä um novo hospede
class Hospede{
	private $nome;
	private $cpf;
	private $nasc;
	private $email;
	private $senha;
	private $telefone;
	
	function __construct($vnome="", $vcpf="", $vnasc="", $vemail="", $vsenha="", $vtel=""){ 
		$this->nome = $vnome;
		$this->cpf = $vcpf;
		$this->nasc = $vnasc;
		$this->email = $vemail;
		$this->senha = $vsenha;
		$this->telefone = $vtel;
	}
	
	function getNome(){
		return $this->nome;
	}
	function getCpf() {
		return $this->cpf;
	}
	function getNasc() {
		return $this->nasc;
	}
	function getEmail() {
		return $this->email;
	}
	function getSenha() {
		return $this->senha;
	}
	function getTelefone() {
		return $this->telefone;
	}
}
?>

