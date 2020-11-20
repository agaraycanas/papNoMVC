<?php
require_once 'db/rb.php';
$dni= isset($_POST['dni'])?$_POST['dni']:null;
$nombre= isset($_POST['nombre'])?$_POST['nombre']:null;

$idPaisNacimiento= isset($_POST['idPaisNacimiento'])?$_POST['idPaisNacimiento']:null;
$idPaisResidencia= isset($_POST['idPaisResidencia'])?$_POST['idPaisResidencia']:null;

$idAficionesGusta = isset($_POST['idAficionesGusta'])?$_POST['idAficionesGusta']:[];
$idAficionesOdia = isset($_POST['idAficionesOdia'])?$_POST['idAficionesOdia']:[];

R::setup('mysql:host=localhost;dbname=test', 'root', '');

if ($dni!=null && $nombre != null &&  (R::findOne('persona','dni=?',[$dni]) == null) ) {
    $persona = R::dispense('persona');
    
    $persona->dni= $dni;
    $persona->nombre = $nombre;
    $persona->nace = R::load('pais',$idPaisNacimiento);
    $persona->vive = R::load('pais',$idPaisResidencia);
    
    R::store($persona);
    
    foreach ($idAficionesGusta as $idAficion) {
        $aficion = R::load('aficion',$idAficion);
        $gusta = R::dispense('gusta');
        $gusta->persona = $persona;
        $gusta->aficion = $aficion;
        R::store($gusta);
    }

    foreach ($idAficionesOdia as $idAficion) {
        $aficion = R::load('aficion',$idAficion);
        $odia = R::dispense('odia');
        $odia->persona = $persona;
        $odia->aficion = $aficion;
        R::store($odia);
    }
    
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