<?php
	include 'php/conexion.php';
	class Procesos{
		function __construct(){
			//Conectamos con la BD
			$this->objeto = new Conexion;
			$this->objeto->conectar();
		}
		function listar(){ //Funcion para listar todos los empleados, solo dni y nombre
			$resultado = $this->objeto->ejecutarConsulta("SELECT * FROM empleados");
			echo '<h1>Listado de empleados</h1>';
			echo '<table>';
			while (!$resultado->EOF) { //EOF indica el final de registro
				echo '<tr>';
				for($i=1; $i<3;$i++){
					if($resultado->fields[$i] != '')
						echo '<td>'.$resultado->fields[$i].'</td>';
					else
						echo '<td> </td>';
				}
				echo '<td><a href="modificar.php?id='.$resultado->fields[0].'">Modificar</a></td>';
				echo '<td><a href="borrar.php?id='.$resultado->fields[0].'">Borrar</a></td>';
				echo '</tr>';
				$resultado->MoveNext(); //cambia al siguiente registro
			}
			echo '</table>';
		}
		function listar2($id){
			$resultado = $this->objeto->ejecutarConsulta('SELECT * FROM empleados WHERE idempleados = '.$id);
			echo '<div>';
			echo '<form method="POST" action="index.php">';
			echo '<input type="text" name="0" value="'.$resultado->fields[0].'" readonly />'; //no deberia de estar pero por mi script sql y el diseño no puedo quitarlo
			for($i=1; $i<count($resultado->fields)/2;$i++){					//readonly hace que no sea editable
				if($i==1)
					$ph = 'DNI';
				if($i==1)
					$ph = 'Nombre';
				if($i==1)
					$ph = 'Email';
				if($i==1)
					$ph = 'Telefono';
				
				if($resultado->fields[$i] != '')
					echo '<input type="text" name="'.$i.'" value="'.$resultado->fields[$i].'" placeholder="'.$ph.'" />';
				else
					echo '<input type="text" name="'.$i.'" placeholder="'.$ph.'"/>';
			}
			echo '<input type="submit" name="modificar" value="Modificar" />';
			echo '</form>';
			echo '</div>';
		}
		function addButtons(){			//añade los botones para añadir un empleado
			echo '<h1>Nuevo empleado</h1>';
			echo '<div>';
			echo '<form action="index.php" method="POST">';
			echo '<input type="text" placeholder="ID" name="ID" required />';
			echo '<input type="text" placeholder="DNI" name="DNI" pattern="[0-9]{8}[a-zA-Z]{1}" required />'; //pattern es para expresiones regulares
			echo '<input type="text" placeholder="Nombre" name="Nombre" required />';
			echo '<input type="e-mail" placeholder="e-mail" name="e-mail" />';
			echo '<input type="text" placeholder="Telefono" name="Telefono" required />';
			echo '<input type="submit" value="Enviar" />';
			echo '</form>';
			echo '</div>';	
		}
		function add($id, $dni, $nombre, $email , $tlf){			
			$this->objeto->ejecutarConsulta('INSERT INTO empleados (idempleados, dni, nombre, correo, telefono) VALUES ('.$id.', "'.$dni.'", "'.$nombre.'", "'.$email.'", "'.$tlf.'")');
		}
		function borrar($id){
			$this->objeto->ejecutarConsulta('DELETE FROM empleados WHERE idempleados = '.$id);
		}
		function modificar($id, $dni, $nombre, $email , $tlf){
			$this->objeto->ejecutarConsulta('UPDATE empleados SET dni= "'.$dni.'", nombre= "'.$nombre.'", correo= "'.$email.'", telefono= "'.$tlf.'" WHERE idempleados = '.$id);
		}
	}
?>
