<?php
require '../config.php';
require '../Model/Customer.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['reset_link'])){
    $email = $_POST['email'];
    $db = Config::getConnexion();
    
    // Check if email exists in the database
    $query = $db->prepare("SELECT email FROM customer WHERE email = ?");
    $query->execute([$email]);
    $row = $query->rowCount();

    if($row == 1){
        // If email exists, generate a random code
        $code = rand(111111, 999999);

        // Formulate the linkrese
        $link = 'http://localhost/atelierPHP/utilisateur/Views/changePassword.php?email=' . $email . '&code=' . $code;
        $link2 = '<span style="width:100%;"><a style="padding:10px 100px;border-radius:30px;background:#a8edbc;" href="' . $link . '">Link</a></span>';

        // Check if email exists in the reset table
        $query_exist =  $db->prepare("SELECT * FROM reset WHERE email = ?");
        $query_exist->execute([$email]);
        $from_reset = $query_exist->fetch();

        if(empty($from_reset)){
            // If email doesn't exist in reset table, insert email and code into the table
            $query_insert = $db->prepare("INSERT INTO reset(email, code) VALUES (?, ?)");
            $query_insert->execute([$email, $code]);
        } else {
            // If email exists in reset table, update the code
            $query_insert = $db->prepare("UPDATE reset SET code = ? WHERE email = ?");
            $query_insert->execute([$code, $email]);
        }

        // Send email with the link
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host ='smtp.gmail.com'; 
        $mail->SMTPAuth =true; 
        $mail->Username ='adam.chemengui@esprit.tn'; 
        $mail->Password='pgjznuoufkbhddgl'; 
        $mail->SMTPSecure ='ssl'; 
        $mail->Port =465; 
        $mail->setFrom('adam.chemengui@esprit.tn', 'Nova_Teck');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Reset password from Nova_Teck';
        $mail->Body = '<p>Dear '.$email.',</p><p>Please click on this link to reset your password:</p>' . $link2 . '<br>Best wishes,<br><span>BioBarter</span>';

        if(!$mail->send()){
            echo ("<script>alert('Sending not successful'); document.location.href = 'index.php';</script>");
        } else {
            // Show success message if email is sent
            $msg = '<h4 class="text-success">Please check your email (including spam) to see the password reset link.</h4>';
        }
    } else {
        // Show error message if email doesn't exist in the database
        $error = '<h4 class="text-danger">Email does not exist!</h4>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Password reset</title>
    <link rel="stylesheet" href="../style1.css" />
  </head>
  <body>
    <!-- <div class="website">
      <img src="../assets/img/logo.png" width="150" alt="logo" />
    </div> -->
    <?php if(isset($msg)){echo $msg;}?>
    <?php if(isset($error)){echo $error;}?>
    <div class="container">
      <div class="header">
        <h2>Reset your password</h2>
      </div>  
      <form class="form" id="form" method="POST" action="resetPassword.php">
        <p>Please enter your email address so you can receive a password reset code in your inbox</p>
        <div class="form-control">
        <input
          type="text"
          name="email"
          id="email"
          placeholder="Email address"/>
        </div>
        <button name="reset_link">Send</button> 
      </div>
      </form>
    </div>
  </body>
</html>