<?php
include '../Controller/reservationC.php';
$res = new reservationC();

if (
    isset($_POST['register-nbr_places']) 
     && isset($_POST['register-num_salles'])
) {
    $reservations = new reservations(
        $_POST['register-nbr_places'],
        $_POST['register-num_salles']
    );
    $res->ajouterreservations($reservations);
     header('Location: affreservation.php');
} else {
    echo 'Some fields are missing.';
}

?>
