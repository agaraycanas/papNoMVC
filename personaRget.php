<?php 
require_once 'db/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');
R::setAutoResolve(true);
$personas = R::findAll('persona'); 
?>

<h1>Lista de personas</h1>

<button><a href="personaCget.php">Nueva</a></button>

<table border="1">
	<tr>
		<th>DNI</th>
		<th>Nombre</th>
		<th>País nac.</th>
		<th>País res.</th>
		<th>Aficiones que me gustan</th>
		<th>Aficiones que odio</th>
		<th>Acción</th>
	</tr>

	<?php foreach ($personas as $persona):?>
	<tr>
		<td>
			<?=$persona->dni?>
		</td>

		<td>
			<?=$persona->nombre?>
		</td>

		<td>
			<?= ($persona->nace_id != null?$persona->fetchAs('pais')->nace->nombre:'-') ?>
		</td>
		
		<td>
			-
		</td>
		
		<td>
			<?php foreach ($persona->ownGustaList as $gusta):?>
				<?=$gusta->aficion->nombre?>
			<?php endforeach;?>
		</td>
		
		<td>
			-
		</td>

		<td>
		
		<form action="personaDpost.php" method="post">
			<button>
				<img src="img/basura.png" width="15" height="15"/>
			</button>
			<input type="hidden" name="idPersona" value="<?=$persona->id?>"/>
		</form>
		
		<form action="personaUget.php" method="get">
			<button>
				<img src="img/lapiz.png" width="15" height="15"/>
			</button>
			<input type="hidden" name="idPersona" value="<?=$persona->id?>"/>
		</form>
		
		</td>
	</tr>
	<?php endforeach;?>
</table>

<button><a href="menu.php">Volver al menú</a></button>