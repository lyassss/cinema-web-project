<?php
include '../Controller/reservationC.php';
$id_res = $_GET["id_res"];
$reservationC=new reservationC();
if(
    isset($_POST['nbr_places']) &&isset($_POST['num_salles'])
  ) 
    
{
    $reservation = new reservations($_POST['nbr_places'],$_POST['num_salles']);
    $reservationC->modifierreservations($id_res,$reservation);
}
else
echo 'erreur';
header('Location: affreservation.php');
?>