<?php
include_once '../config.php';
include '../model/feedback.php';
class feedbackC{
    function afficherfeedback(){
        $sql="SELECT * FROM feedback";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
   
    function supprimerfeedback($id){
        $sql=" DELETE FROM feedback WHERE id_feedback=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id' , $id);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    function ajouterfeedback($feedback){
   
       $sql = "INSERT INTO feedback (nom_et_prenom,email,rating,commentaire,id_s)
                 VALUES (:nom_et_prenom, :email, :rating,:commentaire, :id_s)";
     $db = config::getConnexion();
     try{
         $query = $db->prepare($sql);
         $query->execute([
                'nom_et_prenom' => $feedback->getnom_et_prenom(),
                'email' => $feedback->getemail(),
                'rating' => $feedback->getrating(),
                'commentaire' => $feedback->getcommentaire(),
                'id_s' => $feedback->getid_s()
            
       
        ]);
        $_SESSION['error']="data add seccsesfuly";
} catch (Exception $e){
    $e->getMessage();
}

    }
function modifierfeedback($id_feedback,$feedback){
       try{
        $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE feedback SET 
                   nom_et_prenom = :nom_et_prenom,
                   email = :email,
                    rating = :rating,
                    commentaire = :commentaire
               
                WHERE id_feedback= :id_feedback'
            );
            $query->execute([
                'id_feedback' => $id_feedback,
                'nom_et_prenom' => $feedback->getnom_et_prenom(),
                'email' => $feedback->getemail(),
                'rating' => $feedback->getrating(),
                'commentaire' => $feedback->getcommentaire(),    
    
]);
    } catch (Exception $e){
        $e->getMessage();
}}


function recupererfeedback($id_feedback,$id_s){
    $sql="SELECT * FROM feedback INNER JOIN station on feedback.id_s = station.id_station WHERE station.id_station = $id_s AND id_feedback=$id_feedback";
    $db = config::getConnexion();
try{
    $query = $db->prepare($sql);
$query->execute();
$evenement=$query->fetch();
return $evenement;
}catch (Exception $e){
    $e->getMessage();}
}
function joinstation($id_s){
    $sql=("SELECT * FROM feedback INNER JOIN station on feedback.id_s = station.id_station WHERE station.id_station = $id_s");
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur:' . $e->getMessage());
    }
}
public function getAverageRating($id_s) {
    $db = config::getConnexion();
    $query = $db->prepare('SELECT SUM(rating) as total_rating, COUNT(*) as num_ratings FROM feedback WHERE id_s = :id_s');
    $query->bindParam(':id_s', $id_s, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($result['num_ratings'] > 0) {
        $average_rating = $result['total_rating'] / $result['num_ratings'];
        return $average_rating;
    } else {
        return 0;
    }
}




}
	



?>