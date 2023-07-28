<?php
include '../controller/evenementC.php';
include '../controller/reservationC.php';
$EvenementC = new EvenementC();
$reservation = new ReservationC();
$qauntite=$_GET["quantite"];
$Id_event=$_GET["id_event"];
$Idcat=$_GET["Idcat"];
//$nom="idCustomer";
$IdCustomer=$_GET["idCustomer"];

     if($qauntite > 0){
        $qauntite--;
        $LIST= $EvenementC->recupererevent($Id_event,$Idcat);
       $reservation->ajouterREs($LIST["id_event"],/*$nom*/$LIST["idCustomer"],$LIST["dated_event"],$LIST["dater_event"]);
    
        $EvenementC->updateQuantite($Id_event,$qauntite);
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Evenement réservé avec succes !')
        window.location.href='Listeevenement.php?Idcat=$Idcat';
    </SCRIPT>");
    }
    else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Malheureusement, cet  évenement est complet !')
        window.location.href='Listeevenement.php?Idcat=$Idcat';
    </SCRIPT>");
    }



?>