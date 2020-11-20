<?php
require_once 'db/rb.php';
$nombre = isset($_POST['nombre'])?$_POST['nombre']:null;
$idsPersona = isset($_POST['idPersona'])?$_POST['idPersona']:null;

R::setup('mysql:host=localhost;dbname=test', 'root', '');

if ($nombre != null &&  (R::findOne('pais','nombre=?',[$nombre]) == null) ) {
    $pais= R::dispense('pais');
    $pais->nombre = $nombre;
    foreach ($idsPersona as $idPersona) {
        $persona = R::load('persona',$idPersona);
        $pais -> ownPersonaList [] = $persona;
    }
    R::store($pais);
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