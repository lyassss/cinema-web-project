<?php
class reservations{
    private int $id_res;
    private int $nbr_places;

    private int $num_salles;
   

    public function __construct($nbr_places, $num_salles){
        $this->nbr_places=(int)$nbr_places;
        $this->num_salles = (int)$num_salles;
    
    }
    public function getid_res(){
        return $this->id_res;
    }
    public function getnbr_places(){
        return $this->nbr_places;
    }
    public function getnum_salles(){
        return $this->num_salles;

    }



    public function setnbr_places( $nbr_places){
        $this->nbr_places=$nbr_places;
    }
    public function setnum_salles( $num_salles){
        $this->num_salles=$num_salles;
    }
    
}

?>