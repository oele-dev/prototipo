<?php

$mysqli = new mysqli("localhost", "root", "", "prototipo");
if ($mysqli->connect_errno) {
	echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	die();
}

 if(isset($_POST['cliente'])) {
	$mysqli->query("INSERT INTO empleados(nombre) VALUES ('".$_POST['cliente']."')");
 }

$resultado = $mysqli->query("SELECT * FROM empleados");
$empleados = $resultado->fetch_all();

 $enlaces = [
	 'Turnos',
	 'Pedidos',
	 //'Usuarios',
	 'Reportes',
	 'Cerrar sesión'
 ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Este es titulo</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<div class="left"">
			<img src="https://via.placeholder.com/70x30" alt="Logo de la empresa">
			<div>
				<h1>Nombre del negocio</h1>
				<span>Telefono</span>
			</div>
		</div>
		<div class="right">
			<span>Usuario</span>
		</div>
	</header>
	<nav>
		<ul>
			<?php
				foreach($enlaces as $enlace){
					echo '<li>'. $enlace .'</i>';
				}
			?>
		</ul>
	</nav>
	<main>
		<!--empleados-->
		<div class="empleados">
			<?php
			foreach ($empleados as $empleado) {
				echo "<div class='otro-div'>
						<img src='https://via.placeholder.com/100x70' alt='Imagen del empleado'>
						<h2>Nombre:". $empleado[1]."</h2>
						<span>Turnos: 0</span>
					</div>";
			}
			?>
		</div>

		<form method="post">
			<h2>Crear empleado</h2>
			<div class="field">
				<label for="">Nombre de empleado</label>
				<input type="text" name="cliente">
			</div>

			<button id="enviar-formulario">
				Crear empleado
			</button>
		</form>
	</main>
</body>
</html>