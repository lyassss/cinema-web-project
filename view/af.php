<?php
include '../Controller/filmC.php';
$filmm = new filmC();

if (
    isset($_POST['register-titre']) && isset($_POST['register-genre'])&& isset($_POST['register-img'])
     && isset($_POST['register-ratings'])
) {
    $film = new film(
        $_POST['register-titre'],
        $_POST['register-genre'],
        $_POST['register-img'],
        $_POST['register-ratings']
    );
    $filmm->ajouterfilm($film);
     header('Location: afffilm.php');
} else {
    echo 'Some fields are missing.';
}

?>
