<?php 
require_once 'db/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$paises = R::findAll('pais'); 
?>

<h1>Lista de países</h1>

<button><a href="paisCget.php">Nuevo</a></button>

<table border="1">
	<tr>
		<th>Nombre</th>
		<th>Acción</th>
	</tr>

	<?php foreach ($paises as $pais):?>
	<tr>
		<td>
			<?=$pais->nombre?>
		</td>

		<td>
		
		<form action="paisDpost.php" method="post">
			<button>
				<img src="img/basura.png" width="15" height="15"/>
			</button>
			<input type="hidden" name="idPais" value="<?=$pais->id?>"/>
		</form>
		
		<form action="paisUget.php" method="get">
			<button>
				<img src="img/lapiz.png" width="15" height="15"/>
			</button>
			<input type="hidden" name="idPais" value="<?=$pais->id?>"/>
		</form>
		
		</td>
	</tr>
	<?php endforeach;?>
</table>

<button><a href="menu.php">Volver al menú</a></button>