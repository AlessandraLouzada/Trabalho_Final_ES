<?php
// Ïnstänciä um novo servico contratado pelo cliente.
class ServicoContratado{
	private $numReserva;
	private $servico;


	function __construct($vnum, $vserv){ 
		$this->numReserva = $vnum;
		$this->servico = $vserv;
	}
	
	function getNumReserva(){
		return $this->numReserva;
	}
	function getServico() {
		return $this->servico;
	}
}
?>
