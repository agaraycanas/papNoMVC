<?php 
require_once('db/rb.php');
$idPersona = $_GET['idPersona'];
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$persona = R::load('persona',$idPersona);
?>
<h1>Modificar persona</h1>

<form action="personaUpost.php" method="post">
	DNI
	<input type="text" name="dni" value="<?=$persona->dni?>" />
	<br />

	Nombre
	<input type="text" name="nombre" value="<?=$persona->nombre?>" />
	<br />

	<input type="hidden" name="idPersona" value="<?=$idPersona?>" />
	
	<input type="submit" value="Modificar"/>
</form>
<button><a href="menu.php">Menú</a></button>
