<?php 
require_once('db/rb.php');
$idPais = $_GET['idPais'];
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$persona = R::load('pais',$idPais);
?>
<h1>Modificar país</h1>

<form action="paisUpost.php" method="post">
	Nombre
	<input type="text" name="nombre" value="<?=$persona->nombre?>" />
	<br />

	<input type="hidden" name="idPais" value="<?=$idPais?>" />
	<input type="submit" value="Modificar"/>
</form>
<button><a href="menu.php">Menú</a></button>
