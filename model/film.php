<?php
class film{
    private int $id_film;
    private string $titre;
    private string $genre;
    private string $img;

    private int $ratings;
   

    public function __construct($titre, $genre, $img, $ratings){
        $this->titre=$titre;
        $this->genre=$genre;
        $this->img=$img;
        $this->ratings = (int)$ratings;
    
    }
    public function getid_film(){
        return $this->id_film;
    }
    public function gettitre(){
        return $this->titre;
    }
    public function getgenre(){
        return $this->genre;
    }
    public function getimg(){
        return $this->img;
    }
    public function getratings(){
        return $this->ratings;

    }



    public function settitre( $titre){
        $this->titre=$titre;
    }
    public function setgenre( $genre){
        $this->genre=$genre;
    }
    public function setimg( $img){
        $this->img=$img;
    }
    public function setratings( $ratings){
        $this->ratings=$ratings;
    }
    
}

?>