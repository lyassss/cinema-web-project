<?php
include_once '../config.php';
include '../Model/film.php';
class filmC {
    function afficherfilm(){
        $sql="SELECT * FROM film";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
   
    function supprimerfilm($id_film){
        $sql=" DELETE FROM film WHERE id_film=:id_film";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_film' , $id_film);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    function ajouterfilm($film){

       $sql = "INSERT INTO film (titre,genre,img,ratings)
                 VALUES (:titre, :genre, :img, :ratings)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute([
            'titre'=> $film->gettitre(),
            'genre'=> $film->getgenre(),
            'img'=> $film->getimg(),
            'ratings'=> $film->getratings(),
       
        ]);
        $_SESSION['error']="data add seccsesfuly";
} catch (Exception $e){
    $e->getMessage();
}

    }
function modifierfilm($id_film,$film){
       try{
        $db = config::getConnexion();
$query = $db->prepare('UPDATE film SET titre = :titre, genre= :genre, img= :img, = : ratings = :ratings WHERE id_film= :id_film');
$query->execute([
    'titre'=> $film->gettitre(),
    'genre'=> $film->getgenre(),
    'img'=> $film->getimg(),
    'ratings'=> $film->getratings(),
  
    'id_film'=> $id_film
]);
    } catch (Exception $e){
        $e->getMessage();
}}
function recupererfilm($id_film){
    $sql="SELECT * from film where id_film=$id_film";
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