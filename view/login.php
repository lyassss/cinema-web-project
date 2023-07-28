<?php
session_start();

// Vérification du formulaire de connexion
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['captcha'])) {
    
    // Vérification du captcha
    if ($_SESSION['captcha'] != $_POST['captcha']) {
        echo "<script>alert(\"Captcha incorrect\")</script>";
    } else {
        // Création d'un nouvel objet CustomerC
        include '../Controller/CustomerC.php';
        $customerC = new CustomerC();

        // Récupération du client
        $customer = $customerC->findCustomer($_POST['username'], $_POST['email'], md5($_POST['pwd']));

        // Si le client est trouvé, on enregistre les informations de session et on redirige vers la page d'accueil
        if (!empty($customer)) {
            $_SESSION["username"] =  $customer["username"];
            $_SESSION["email"] =  $customer["email"]; 
            $_SESSION["pwd"] =  $customer["pwd"];

            if($customer["Role"] == "client") {
                
                header('Location: http://localhost/projet web stage\view/index.php');
            } else {
                header('Location: http://localhost/projet web stage\view/index.PHP');
            }
            die();
        } else {
            echo "<script>alert(\"Informations de connexion incorrectes\")</script>";
        }
    }
}

// Génération du captcha
$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$captcha = substr(str_shuffle($chars), 0, 5);
$_SESSION['captcha'] = $captcha;
?>
<style type="text/css">

.form-control1 {
    
    order: 2;
  color: #fde9ff;
  font-weight: 900;
  text-transform: uppercase;
  font-size: clamp(1rem, 5vw, 2rem);
  line-height: 0.75em;
  text-align: center;
  text-shadow: 3px 1px 1px #412A25, 2px 2px 1px #165bfb, 4px 2px 1px #4af7ff,
    3px 3px 1px #165bfb, 5px 3px 1px #4af7ff, 4px 4px 1px #165bfb,
    6px 4px 1px #4af7ff, 5px 5px 1px #165bfb, 7px 5px 1px #4af7ff,
    6px 6px 1px #165bfb, 8px 6px 1px #4af7ff, 7px 7px 1px #165bfb,
    9px 7px 1px #4af7ff;

  span {
    display: block;
    position: relative;

    &:before {
      content: attr(data-text);
      position: absolute;
      text-shadow: 2px 2px 1px #e94aa1, -1px -1px 1px #ECA412,
        -2px 2px 1px #138136, 1px -1px 1px #7956B4;
      z-index: 1;
    }

    &:nth-child(1) {
      padding-right: 2.25rem;
    }

    &:nth-child(2) {
      padding-left: 2.25rem;
    }
  }
}


</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "icon" href ="images/logo.png" type = "image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style1.css">
    <title> Log In</title>
</head>
<body>
<div class="container">
    <form id="form" class="form" autocomplete="off" method="POST">
        <h3 id="formName">   LOGIN NOW!  </h3>
        <div class="form-control">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
            <small>Error message</small>
        </div>
        <div class="form-control">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" >
            <small>Error message</small>
        </div>
        <div class="form-control">
            <label for="pwd">Password</label>
            <input type="password" id="pwd" name="pwd">
            <small>Error message</small>
        </div>
        <div class="form-control">
            <label for="pwd">Confirm Passsword</label>
            <input type="password" id="pwd" name="pwd">
            <small>Error message</small>
        </div>
        <div class="form-control1">
            <label for="captcha"> captcha:  <?php echo $captcha; ?></label>
            </div>
            <br>
            <div class="form-control">
            <input type="text" id="captcha" name="captcha">
            <small>Error message</small>
        </div>
        <button type="submit">Submit</button>
        <a href="resetPassword.php">forget your