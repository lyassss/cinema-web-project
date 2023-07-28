<?php
class Reservation{
    private int $id_reservation;
    private int $id_event;
    private int $idCustomer;
    private $dated_event;
    private $dater_event;


   

    public function __construct($idCustomer , $id_event, $dated_event, $dater_event){
        $this->idCustomer=$idCustomer;
        $this->id_event=$id_event;
        $this->dated_event=$dated_event;
        $this->dater_event=$dater_event;
        
      
    }
    public function getid_event(){
        return $this->id_event;
    }
    public function getIdCustomer(){
        return $this->idCustomer;
    }
 
    public function getdated_event(){
        return $this->dated_event;
    }
    public function getdater_event(){
        return $this->dater_event;
    }


  
    
}

?>