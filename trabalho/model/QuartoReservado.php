<?php
// Ïnstänciä um novo quarto reservado
class QuartoReservado{
	private $numReserva;
	private $quarto;

	function __construct($vnum, $vquart){ 
		$this->numReserva = $vnum;
		$this->quarto = $vquart;
	}
	
	function getNumReserva(){
		return $this->numReserva;
	}
	function getQuarto() {
		return $this->quarto;
	}
}
