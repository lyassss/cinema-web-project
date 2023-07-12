<?php
include_once '../config.php';
include '../Model/reservation.php';
class reservationC {
    function afficherreservations(){
        $sql="SELECT * FROM reservations";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
   
    function supprimerreservations($id_res){
        $sql=" DELETE FROM reservations WHERE id_res=:id_res";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_res' , $id_res);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    function ajouterreservations($reservations){

       $sql = "INSERT INTO reservations (nbr_places,num_salles)
                 VALUES (:nbr_places, :num_salles)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute([
            'nbr_places'=> $reservations->getnbr_places(),
           
            'num_salles'=> $reservations->getnum_salles(),
       
        ]);
        $_SESSION['error']="data add seccsesfuly";
} catch (Exception $e){
    $e->getMessage();
}

    }
function modifierreservations($id_res,$reservations){
       try{
        $db = config::getConnexion();
$query = $db->prepare('UPDATE reservations SET nbr_places = :nbr_places,  = : num_salles = :num_salles WHERE id_res= :id_res');
$query->execute([
    'nbr_places'=> $reservations->getnbr_places(),
    'num_salles'=> $reservations->getnum_salles(),
  
    'id_res'=> $id_res
]);
    } catch (Exception $e){
        $e->getMessage();
}}
function recupererreservations($id_res){
    $sql="SELECT * from reservations where id_res=$id_res";
    $db = config::getConnexion();
try{
    $query = $db->prepare($sql);
$query->execute();
$service=$query->fetch();
return $service;
}catch (Exception $e){
    $e->getMessage();}
}
}
?>