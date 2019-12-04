<?php
class ReservaDAO{
	
	function __construct(){
	}
	// Ïnsere ä reservä feitä pelo hospede na tabela reservär 
	// pässändo por parametro os dädos dä reservä. 
	function realizar($reserva, $conn){
		$sql = "INSERT INTO reservar (dataEntrada,dataSaida,cpf) values ('".
			($reserva->getDataEnt())."','".
			($reserva->getDataSai())."','".
			($reserva->getCpf())."')";
			
		
		$conn->query($sql);
		
	}
	// Verificä se tem um quärto disponivel do tipo escolhido pelo hospede näs datas de enträdä e säidä
	function qDisponivel($quarto, $dataEnt, $dataSai, $conn){
		
		if($quarto === "luxo"){
			$sql = "SELECT q.numQuarto FROM quarto q, reservar r WHERE q.reservado=FALSE AND q.numQuarto <= 210 AND q.numQuarto>= 200 OR r.dataEntrada >'".$dataEnt."'AND q.numQuarto <= 210 AND q.numQuarto>= 200 OR r.dataSaida <'".$dataSai."'AND q.numQuarto <= 210 AND q.numQuarto>= 200";
		}
		else if($quarto === "pres"){
			$sql = "SELECT q.numQuarto FROM quarto q, reservar r WHERE q.reservado=FALSE AND q.numQuarto <= 310 AND q.numQuarto>= 300 OR r.dataEntrada >'".$dataEnt."'AND q.numQuarto <= 310 AND q.numQuarto>= 300 OR r.dataSaida <'".$dataSai."'AND q.numQuarto <= 310 AND q.numQuarto>= 300";
		}
		else if($quarto === "cont"){
			$sql = "SELECT q.numQuarto FROM quarto q, reservar r WHERE q.reservado=FALSE AND q.numQuarto <= 110 AND q.numQuarto>= 100 OR r.dataEntrada >'".$dataEnt."'AND q.numQuarto <= 110 AND q.numQuarto>= 100 OR r.dataSaida <'".$dataSai."'AND q.numQuarto <= 110 AND q.numQuarto>= 100";
		}
		$res = mysqli_query($conn, $sql);
		$reg = $res->fetch_assoc();
		return $res;
	}
	// Verificä quäl é o numero dä reservä em umä determinädä dätä de enträdä e cpf.
	function numeReserva($dataEnt, $vcpf, $conn){
		$numReserva = $conn->query("SELECT numReserva FROM reservar WHERE dataEntrada='".$dataEnt."'AND cpf='".$vcpf."'");
		return $numReserva;
	}
	// Verificä determinädos dädos cädästrädos de um hospede, com o cpf
	// pässädo por pärämetro, e em sua reserva, näs täbeläs hospede, reservar, quarto, 
	// servicocontratado, servico e quartoreservado.
	function consultar($cpf, $conn){
		$res = $conn->query("SELECT  h.nome, r.cpf, r.numReserva, r.dataEntrada, r.dataSaida, t.numQuarto, q.tipoQuarto, s.tipoServico FROM reservar r, quarto q, servicocontratado c, servico s, hospede h, quartoreservado t WHERE t.numReserva = r.numReserva AND t.numQuarto = q.numQuarto AND c.numReserva = r.numReserva AND c.idServico = s.idServico AND h.cpf = r.cpf AND r.cpf=".$cpf);
		return $res;
	}
	// Verificä dädos de umä reservä, pässädä por pärämetro, consultä äs
	// täbeläs reservar, servicocontratado, hospede, quartoreservado e quarto.
	function consultarReserva($res, $conn){
		$res = $conn->query("SELECT r.numReserva, r.dataEntrada, r.dataSaida, t.tipoQuarto, c.idServico, r.cpf, h.nome FROM reservar r, servicocontratado c, hospede h, quartoreservado q, quarto t WHERE h.cpf=r.cpf AND q.numQuarto=t.numQuarto AND r.numReserva=".$res);
		return $res;
	}
	// Exclui os dädos de todäs äs täbeläs que possuem o numReservä pässädo por pärämetro, sendo elas a reservar, quartoreservado e servicocontratado
	function excluir($num, $conn){
		$res = $conn->query("DELETE FROM reservar WHERE numReserva=".$num);
		return $res;
	}
	// Altera dädos näs täbeläs reservar, servicocontratado e quartoreservado.
	function alterar($dataEnt, $dataSai, $servicos, $numQuarto, $nReserva, $conn){
		$res = $conn->query("UPDATE reservar r, servicocontratado s, quartoreservado q SET r.dataEntrada='". $dataEnt . "',r.dataSaida='".$dataSai."',s.idServico='" . $servicos . "',q.numQuarto='" . $numQuarto . "'WHERE r.numReserva='" .$nReserva. "'AND q.numReserva='" .$nReserva. "'AND s.numReserva='" .$nReserva."'");
		return $res;
	}
}
?>
o
