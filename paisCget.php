<?php 
require_once 'db/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$personas = R::find('persona','pais_id IS null');
?>
<h1>Nuevo país</h1>

<form action="paisCpost.php" method="post">

	Nombre
	<input type="text" name="nombre" />
	<br />
	
	<fieldset>
	<legend>Habitantes</legend>
	<?php foreach ($personas as $persona):?>
		<input type="checkbox" id="id-<?=$persona->id?>" name="idPersona[]" value="<?=$persona->id?>" >
		<label for="id-<?=$persona->id?>"><?=$persona->nombre?></label>
	<?php endforeach;?>
	</fieldset>

	<input type="submit" value="Crear"/>
</form>
<button><a href="menu.php">Menú</a></button>
