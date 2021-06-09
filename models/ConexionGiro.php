<?php
class ConexionGiro{
	public static function conectar(){
		try{
			$link = new PDO("sqlsrv:server=192.168.0.14;Database=ASE20", "intranet", "Roselee_2018");
			return $link;
		}
		catch(PDOException $e){
			return false;
		}
	}
}
