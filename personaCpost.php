<?php
require_once 'db/rb.php';
$dni= isset($_POST['dni'])?$_POST['dni']:null;
$nombre= isset($_POST['nombre'])?$_POST['nombre']:null;
$idPais= isset($_POST['idPais'])?$_POST['idPais']:null;

R::setup('mysql:host=localhost;dbname=test', 'root', '');

if ($dni!=null && $nombre != null &&  (R::findOne('persona','dni=?',[$dni]) == null) ) {
    $persona = R::dispense('persona');
    
    $persona->dni= $dni;
    $persona->nombre = $nombre;
    $persona->pais = R::load('pais',$idPais);
    
    R::store($persona);
    header('Location:personaRget.php');
}
else {
    if ($nombre==null) {
        echo "No se puede crear una persona sin nombre";
    }
    else {
        echo "El dni $dni ya existe";
    }
    echo '<br/><button><a href="personaCget.php">Volver</a></button>';
}
?>