<?php
require_once('db/rb.php');
R::setup('mysql:host=localhost;dbname=test', 'root', '');

if (R::findOne('pais','nombre=?',[$_POST['nombre']]) == null) {
    $persona = R::load('pais',$_POST['idPais']);

    $persona->nombre = $_POST['nombre'];
    
    
    R::store($persona);
    
    header('Location:paisRget.php');
}
else {
    echo "{$_POST['nombre']} ya existe";
    echo '<br/><button><a href="paisRget.php">Volver</a></button>';
}
?>