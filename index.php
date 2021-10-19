<!DOCTYPE html>
<?php
	include_once 'php/procesos.php';
	$procesos = new Procesos;
?>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Inicio</title>
		<link rel="stylesheet" href="css/estiloini.css"> 
	</head>
	<body>
		<main>
			<article>
				<?php
					if(isset($_POST['listar'])){
						$procesos->listar();
					}
					if(isset($_POST['add'])){
						$procesos->addButtons();
					}
					if(isset($_POST['ID'])){
						$procesos->add($_POST['ID'], $_POST['DNI'], $_POST['Nombre'], $_POST['e-mail'], $_POST['Telefono']);
					}
					if(isset($_POST['modificar'])){
						$procesos->modificar($_POST['0'], $_POST['1'], $_POST['2'], $_POST['3'], $_POST['4']);
					}
				?>
			</article>
			<article>
				<form action="index.php" method="POST">
					<?php
						if(!isset($_POST['listar']))
							echo '<input type="submit" name="listar" value="Listar empleados" />';		
					?>
				</form>
				<a href="anadir.php">Añadir un nuevo empleado</a>
			</article>
		</main>
	</body>
</html>
