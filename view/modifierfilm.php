<?php
include '../Controller/filmC.php';
$id_film = $_GET["id_film"];
$filmC=new filmC();
if(
    isset($_POST['titre']) &&isset($_POST['genre']) &&isset($_POST['img'])&&isset($_POST['ratings'])
  ) 
    
{
    $film = new film($_POST['titre'],$_POST['genre'],$_POST['img'],$_POST['ratings']);
    $filmC->modifierfilm($id_film,$film);
}
else
echo 'erreur';
header('Location: afffilm.php');
?>