<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Borrar</title>
		<link rel="stylesheet" href="css/estiloadd.css"> 
	</head>
	<body>
		<main>
			<article>
				<?php
					include_once 'php/procesos.php';
					$procesos = new Procesos;
					echo '<p> ¿Esta seguro de que desea borrar al empleado número '.$_GET['id'].'</p>';
					echo'<form method="POST">';
					echo '<input type="submit" name="si" value="Si" />';	
					echo '<input type="submit" name="no" value="No" />';		
					echo '</form>';
					if(isset($_POST['si'])){
						$procesos->borrar($_GET['id']);
						header('Location: ../web/index.php');
					}
					else if(isset($_POST['no'])){
						header('Location: ../web/index.php');
					}					
				?>
			</article>
		</main>
	</body>
</html>