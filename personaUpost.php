<?php
require_once('db/rb.php');
R::setup('mysql:host=localhost;dbname=test', 'root', '');

$persona = R::load('persona',$_POST['idPersona']);

if ( $persona->dni == $_POST['dni'] ||
    R::findOne('persona','dni=?',[$_POST['dni']]) == null
    ) {
    
    
    $persona->dni= $_POST['dni'];
    $persona->nombre = $_POST['nombre'];
    
    R::store($persona);
    
    header('Location:personaRget.php');
}
else {
    echo "El DNI {$_POST['dni']} ya existe";
    echo '<br/><button><a href="personaRget.php">Volver</a></button>';
}
?>