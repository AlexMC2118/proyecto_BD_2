<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Modificar</title>
		<link rel="stylesheet" href="css/estiloadd.css"> 
	</head>
	<body>
		<main>
			<article>
				<?php
					include_once 'php/procesos.php';
					$procesos = new Procesos;
					$procesos->addButtons();
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
			</article>
		</main>
	</body>
</html>