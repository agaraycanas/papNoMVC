<?php
require_once 'db/rb.php';
$idPersona = isset($_POST['idPersona'])?$_POST['idPersona']:null;

if ($idPersona != null) {
    R::setup('mysql:host=localhost;dbname=test', 'root', '');
    $persona = R::load('persona',$idPersona);
    R::trash($persona);
    header('Location:personaRget.php');
}
else {
    echo '<h1>Id persona incorrecto</h1>';
}
?>