<?php
include_once '../config.php';
include '../Model/reservation.php';
class ReservationC{
    

    function ajouterREs($id,$idc,$dated,$dater){
   
       $sql = "INSERT INTO reservation (idCustomer,id_event,dated_event,dater_event)
                 VALUES (:idCustomer, :id_event, :dated_event,:dater_event)";
     $db = config::getConnexion();
     try{
         $query = $db->prepare($sql);
         $query->execute([
                'idCustomer' => $idc,
                'id_event' => $id,
                'dated_event' => $dated,
                'dater_event' => $dater,
                
            
       
        ]);
        $_SESSION['error']="data add seccsesfuly";
} catch (Exception $e){
    $e->getMessage();
}

    }

 
    function afficherres(){
        $sql="SELECT * FROM reservation";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }



}
	



?>