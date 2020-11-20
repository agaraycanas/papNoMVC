<?php 
require_once 'db/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$paises = R::findAll('pais');
$aficiones = R::findAll('aficion');
?>

<h1>Nueva persona</h1>

<form action="personaCpost.php" method="post">

	DNI
	<input type="text" name="dni" />
	<br />

	Nombre
	<input type="text" name="nombre" />
	<br />
	
	País nacimiento
	<select name="idPaisNacimiento">
		<?php foreach ($paises as $pais):?>
		<option value="<?=$pais->id?>">
			<?=$pais->nombre?>
		</option>
		<?php endforeach;?>
	</select>
	<br/>
	
	País residencia
	<select name="idPaisResidencia">
		<?php foreach ($paises as $pais):?>
		<option value="<?=$pais->id?>">
			<?=$pais->nombre?>
		</option>
		<?php endforeach;?>
	</select>

	<fieldset>
	<legend>
	Escoge tus aficiones favoritas
	</legend>
		<?php foreach ($aficiones as $aficion):?>
			<input type="checkbox" id="idg-<?=$aficion->id?>" value="<?=$aficion->id?>" name="idAficionesGusta[]">
			<label for="idg-<?=$aficion->id?>"><?=$aficion->nombre?></label>
		<?php endforeach;?>
	</fieldset>

	<fieldset>
	<legend>
	Escoge tus aficiones odiadas
	</legend>
		<?php foreach ($aficiones as $aficion):?>
			<input type="checkbox" id="ido-<?=$aficion->id?>" value="<?=$aficion->id?>" name="idAficionesOdia[]">
			<label for="ido-<?=$aficion->id?>"><?=$aficion->nombre?></label>
		<?php endforeach;?>
	</fieldset>


	<input type="submit" value="Crear"/>
</form>
<button><a href="menu.php">Menú</a></button>
