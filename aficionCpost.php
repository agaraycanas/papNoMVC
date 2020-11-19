<?php
require_once 'db/rb.php';

$nombre = isset($_POST['nombre'])?$_POST['nombre']:null;

R::setup('mysql:host=localhost;dbname=test', 'root', '');

if ($nombre != null &&  (R::findOne('aficion','nombre=?',[$nombre]) == null) ) {
    $persona = R::dispense('aficion');
    $persona->nombre = $nombre;
    
    R::store($persona);
    header('Location:aficionRget.php');
}
else {
    if ($nombre==null) {
        echo "No se puede crear una afición sin nombre";
    }
    else {
        echo "$nombre ya existe";
    }
    echo '<button><a href="aficionCget.php">Volver</a></button>';
}
?>