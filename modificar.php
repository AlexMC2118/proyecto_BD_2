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
					$procesos->listar2($_GET['id']);
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
