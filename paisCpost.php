<?php
require_once 'db/rb.php';
$nombre = isset($_POST['nombre'])?$_POST['nombre']:null;
$idsPersona = isset($_POST['idPersona'])?$_POST['idPersona']:null;

R::setup('mysql:host=localhost;dbname=test', 'root', '');

if ($nombre != null &&  (R::findOne('pais','nombre=?',[$nombre]) == null) ) {
    $persona = R::dispense('pais');
    $persona->nombre = $nombre;
    foreach ($idsPersona as $idPersona) {
        $persona = R::load('persona',$idPersona);
        $persona -> ownPersonaList [] = $persona;
    }
    R::store($persona);
    header('Location:paisRget.php');
}
else {
    if ($nombre==null) {
        echo "No se puede crear un país sin nombre";
    }
    else {
        echo "$nombre ya existe";
    }
    echo '<button><a href="paisCget.php">Volver</a></button>';
}
?>