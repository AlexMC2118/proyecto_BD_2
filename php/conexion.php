<?php
	include 'adodb5/adodb.inc.php';
	class Conexion {
		function __construct(){
			$this->DB = NewADOConnection('mysqli');
		}
		function conectar(){
			$server='11.2daw.esvirgua.com';
			$user='';
			$contrasenia='';
			$db='user2daw_BD1-11';

			$this->DB->Connect($server, $user, $contrasenia, $db);
		}
		function ejecutarConsulta($consulta){
			$resultado = $this->DB->Execute($consulta);
			// if (!$this->DB->Execute($consulta)) {
				// echo 'Error: '.$this->DB->ErrorMsg();
			// }
			return $resultado;
		}
	}
?>
