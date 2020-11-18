<?php 
require_once 'db/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$personas = R::findAll('pais');
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
	<select name="idPais">
		<?php foreach ($personas as $pais):?>
		<option value="<?=$pais->id?>">
			<?=$pais->nombre?>
		</option>
		<?php endforeach;?>
	</select>

	<input type="submit" value="Crear"/>
</form>
<button><a href="menu.php">Menú</a></button>
