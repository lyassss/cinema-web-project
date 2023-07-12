<?php
include '../Controller/reservationC.php';
$reservationC=new reservationC();
$reservationC->supprimerreservations($_GET["id_res"]);

header('Location: affreservation.php');
?>