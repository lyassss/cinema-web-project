<?php
include '../config.php';
include '../Model/Station.php';

class StationC
{
    public function listStations()
    {
        $sql = "SELECT * FROM station";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteStation($id)
    {
        $sql = "DELETE FROM station WHERE id_station = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addStation($station)
{
    $sql = "INSERT INTO station (nom, emplacement, nb_bornes, availability) VALUES (:nom, :emplacement, :nb_bornes, :availability)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $station->getNom(),
            'emplacement' => $station->getEmplacement(),
            'nb_bornes' => $station->getNbBornes(),
            'availability' => $station->getavailability()
        ]);
        return true;
    } catch (PDOException $e) {
        echo "Error adding station: " . $e->getMessage();
        return false;
    }
}



function updateStation($station, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE station SET 
                nom = :nom, 
                emplacement = :emplacement,
                nb_bornes = :nb_bornes,
                availability = :availability
            WHERE id_station= :id_station'
        );
        $query->execute([
            'nom' => $station->getNom(),
            'emplacement' => $station->getEmplacement(),
            'nb_bornes' => $station->getNbBornes(),
            'availability' => $station->getAvailability(),
            'id_station' => $id // add this line to bind the parameter
        ]);
        echo $query->rowCount(). " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage(); // add this line to display the error message
    }
}


    function showStation($id)
    {
        $sql = "SELECT * from station where id_station = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $station = $query->fetch();
            return $station;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function SortByName (){
        $sql = "SELECT * FROM station ORDER BY nom";
        $db  = config ::getConnexion();
        try {
         $list = $db->query($sql);
         return $list;
        }
    
        catch (Exception $e){
            echo($e->getMessage());
        }
    }
}