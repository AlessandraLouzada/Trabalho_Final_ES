<?php
// Ïnstänciä um novo reserva
class Reserva{
	private $numReserva;
	private $cpf;
	private $dataEnt;
	private $dataSai;


	function __construct($vdatE, $vdatS, $vcpf){ 
		$this->cpf = $vcpf;
		$this->dataEnt = $vdatE;
		$this->dataSai = $vdatS;
	}
	
	function getDataEnt(){
		return $this->dataEnt;
	}
	function getCpf() {
		return $this->cpf;
	}
	function getDataSai() {
		return $this->dataSai;
	}

	function getNumReserva() {
		return $this->numReserva;
	}
	
}
?>
