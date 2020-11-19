<?php 
require_once 'db/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$aficiones = R::findAll('aficion'); 
?>

<h1>Lista de aficiones</h1>

<button><a href="aficionCget.php">Nueva</a></button>

<table border="1">
	<tr>
		<th>Nombre</th>
		<th>Acción</th>
	</tr>

	<?php foreach ($aficiones as $aficion):?>
	<tr>
		<td>
			<?=$aficion->nombre?>
		</td>
		
		<td>
		
		<form action="aficionDpost.php" method="post">
			<button>
				<img src="img/basura.png" width="15" height="15"/>
			</button>
			<input type="hidden" name="idAficion" value="<?=$aficion->id?>"/>
		</form>
		
		<form action="aficionUget.php" method="get">
			<button>
				<img src="img/lapiz.png" width="15" height="15"/>
			</button>
			<input type="hidden" name="idAficion" value="<?=$aficion->id?>"/>
		</form>
		
		</td>
	</tr>
	<?php endforeach;?>
</table>

<button><a href="menu.php">Volver al menú</a></button>