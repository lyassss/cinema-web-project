<?php
include '../Controller/filmC.php';
$filmC=new filmC();
$filmC->supprimerfilm($_GET["id_film"]);

header('Location: afffilm.php');
?>