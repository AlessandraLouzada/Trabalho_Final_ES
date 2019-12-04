<?php
class ServicoDAO{
	
	function __construct(){
	}
	// Ïnsere o serviço ä ser reservädo pelo hospede na tabela servicocontratado 
	// pässändo por parametro o numero dä reservä. 
	function cadastrar($reserva, $conn){
		$sql = "INSERT INTO servicocontratado (idServico,numReserva) values ('".
			($reserva->getServico())."','".
			($reserva->getNumReserva())."')";
		$conn->query($sql);
	}
}
?>
