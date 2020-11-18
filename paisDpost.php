<?php
require_once 'db/rb.php';
$idPais = isset($_POST['idPais'])?$_POST['idPais']:null;

if ($idPais!=null) {
    R::setup('mysql:host=localhost;dbname=test', 'root', '');
    $persona = R::load('pais',$idPais);
    R::trash($persona);
    header('Location:paisRget.php');
}
?>