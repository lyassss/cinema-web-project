<?php
class feedback{
    private int $id_feedback;
    private string $nom_et_prenom;
    private string $email;
    private string $commentaire;
    private int $rating;
    private int $id_s;

   

    public function __construct($nom_et_prenom, $email, $commentaire, $rating,  $id_s){
        $this->nom_et_prenom=$nom_et_prenom;
        $this->email=$email;
        $this->commentaire=$commentaire;
        $this->rating=$rating;
        $this->id_s=$id_s;
        
      
    }
    public function getid_feedback(){
        return $this->id_feedback;
    }
    public function getnom_et_prenom(){
        return $this->nom_et_prenom;
    }
    public function getemail(){
        return $this->email;
    }
    public function getcommentaire(){
        return $this->commentaire;
    }
    public function getrating(){
        return $this->rating;
    }

  
    public function getid_s(){
        return $this->id_s;
    }


    public function setnom_et_prenom( $nom_et_prenom){
        $this->nom_et_prenom=$nom_et_prenom;
    }
    public function setemail( $email){
        $this->email=$email;
    }
    public function setcommentaire( $commentaire){
        $this->commentaire=$commentaire;
    }
    public function setrating( $rating){
        $this->rating=$rating;
    }

    public function setid_s( $id_s){
        $this->id_s=$id_s;
    }
  
    
}

?>