<?php

include '../Controller/CustomerC.php';

$error = "";
$Role="client";
// create customer
$customer = null;

// create an instance of the controller
$customerC = new CustomerC();
if (
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["email"])&&
    isset($_POST["username"])&&
    isset($_POST["address"]) &&
    isset($_POST["dob"]) &&
    isset($_POST["pwd"]) 
) {
    if (
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["username"]) &&
        !empty($_POST["address"]) &&
        !empty($_POST["dob"]) &&
        !empty($_POST["pwd"])
      
    ) {
        $customer = new Customer(
            null,
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['username'],
            $_POST['email'],
            $_POST['address'],
            new DateTime($_POST['dob']),
            md5($_POST['pwd']),
           $Role
        );
        $customerC->addCustomer($customer);
        // header('Location:ListCustomers.php');
        header('Location:login.php');
    } else
        $error = "Missing information";
}
$customer = null;
$customerC = new CustomerC();
if (isset($_POST['username'])&& isset($_POST['email']) && isset($_POST['pwd'])) {
  // var_dump($_POST);
  $customer = $customerC->findCustomer($_POST['username'],$_POST['email'],md5($_POST['pwd']));
  if(!empty($customer)){
      session_start();
      $_SESSION["username"] =  $customer["username"];
      $_SESSION["email"] =  $customer["email"]; 
      $_SESSION["pwd"] =  $customer["pwd"];
      var_dump($_SESSION);
      if($customer["Role"] == "admin")
 {
     header('Location: http://localhost/atelierPHP/wetransfer_integration_2023-05-07_2117/integration1/Views/index1.php');
   }else{ header('Location: http://localhost/atelierPHP/utilisateur/Views/index1.php');
          
  }  
      die();
  }else{ echo "<script>alert(\"An Error occured\")</script>";}
}else {echo "<script>alert(\"lacking info\")</script>";}
     

?>
<script>
      function validateForm() {
          var firstNameInput = document.getElementById("firstName");
          var lastNameInput = document.getElementById("lastName");
          var usernameInput = document.getElementById("username");
          var emailInput = document.getElementById("email");
          var addressInput = document.getElementById("address");
          var dobInput = document.getElementById("dob");
          var passwordInput = document.getElementById("pwd");
          var confirmPasswordInput = document.getElementById("pwd1");
        
          var firstNameError = document.getElementById("firstName-error");
          var lastNameError = document.getElementById("lastName-error");
          var usernameError = document.getElementById("username-error");
          var emailError = document.getElementById("email-error");
          var addressError = document.getElementById("address-error");
          var dobError = document.getElementById("dob-error");
          var passwordError = document.getElementById("password-error");
          var confirmPasswordError = document.getElementById("confirmPassword-error");
        
          var firstName = document.getElementById("firstName").value;
          var isValid = true;
          //firstname

          var nameRegex = /^[a-zA-Z]+$/;
          var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

            // Validate first name

            if (firstNameInput.value.trim() === "") {
              firstNameError.innerHTML = "Le champ firstName doit être rempli";
            firstNameError.style.display = "block";
            firstNameInput.style.border = "1px solid red";
            isValid = false;
            } else if (!nameRegex.test(firstName)) {
            firstNameError.innerHTML = "L'adresse firstName est invalide";
            firstNameError.style.display = "block";
            firstNameInput.style.border = "1px solid red";
            isValid = false;
            } else {
              firstNameError.style.display = "none";
              firstNameInput.style.border = "";
            }
            //lastname
          if (lastNameInput.value.trim() === "") {
            lastNameError.innerHTML = "Le champ lastname doit être rempli";
            lastNameError.style.display = "block";
            lastNameInput.style.border = "1px solid red";
            isValid = false;
          } else {
            lastNameError.style.display = "none";
            lastNameInput.style.border = "";
          }
        //username
        if (usernameInput.value.trim() === "") {
            usernameError.innerHTML = "Le champ username doit être rempli";
            usernameError.style.display = "block";
            usernameInput.style.border = "1px solid red";
            isValid = false;
          } else {
            usernameError.style.display = "none";
            usernameInput.style.border = "";
          }
          //role
      
          //address
        if (addressInput.value.trim() === "") {
            addressError.innerHTML = "Le champ address doit être rempli";
            addressError.style.display = "block";
            addressInput.style.border = "1px solid red";
            isValid = false;
          } else {
            addressError.style.display = "none";
            addressInput.style.border = "";
          }
          //dob
        if (dobInput.value.trim() === "") {
            dobError.innerHTML = "Le champ Date naissance doit être rempli";
            dobError.style.display = "block";
            dobInput.style.border = "1px solid red";
            isValid = false;
          } else {
            dobError.style.display = "none";
            dobInput.style.border = "";
          }
          //email
          if (emailInput.value.trim() === "") {
            emailError.innerHTML = "Le champ e-mail doit être rempli";
            emailError.style.display = "block";
            emailInput.style.border = "1px solid red";
            isValid = false;
          } else if (!isValidEmail(emailInput.value)) {
            emailError.innerHTML = "L'adresse e-mail est invalide";
            emailError.style.display = "block";
            emailInput.style.border = "1px solid red";
            isValid = false;
          } else {
            emailError.style.display = "none";
            emailInput.style.border = "";
          }

          //password
          if (passwordInput.value.trim() === "") {
            passwordError.innerHTML = "Le champ mot de passe doit être rempli";
            passwordError.style.display = "block";
            passwordInput.style.border = "1px solid red";
            isValid = false;
          } else if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordError.innerHTML = "Les mots de passe ne correspondent pas";
            confirmPasswordError.style.display = "block";
            passwordInput.style.border = "1px solid red";
            confirmPasswordInput.style.border = "1px solid red";
            isValid = false;
          } else {
            passwordError.style.display = "none";
            passwordInput.style.border = "";
            confirmPasswordInput.style.border = "";
          }
          
          return isValid;
        }
        function isValidEmail(email) {
          var regex = /^\S+@\S+\.\S+$/;
          return regex.test(email);
        }
    </script>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Animated Form</title>
  <head>
	<meta charset="UTF-8">
	<title>AnimaForm</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<section class="forms-section">
  <h1 class="section-title">NOVA-TECK</h1>
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login">
        Login
        <span class="underline"></span>
      </button>
      <form class="form form-login" id="form" autocomplete="off" method="POST">
        <fieldset>
          <legend>Please, enter your email and password for login.</legend>
          <div class="input-block">
            <label for="username">username</label>
            <input id="username" name="username" type="text" >
          </div>
          <div class="input-block">
            <label for="email">E-mail</label>
            <input id="email" name="email" type="email" >
          </div>
          <div class="input-block">
            <label for="pwd">Password</label>
            <input id="pwd" name="pwd" type="password" >
          </div>
          <div class="input-block">
            <label for="pwd">confirme Password</label>
            <input id="pwd" name="pwd" type="password" >
          </div>
          
        </fieldset>
        <button type="submit" class="btn-login">Login</button>
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup">        Sign-Up 
        <span class="underline"></span>
      </button>
      <form id="form" class="form form-signup" autocomplete="off" method="POST">
        <fieldset>
          <legend>Please, enter your email, password and password confirmation for sign up.</legend>
          <div class="input-block">
            <input type="text"  name="firstName" id="firstName"    placeholder="First Name">
            <span id="firstName-error" class="error-message"></span>
          </div>
          <div class="input-block">
            <input type="text"   name="lastName" id="lastName"  placeholder="Last Name">
            <span id="lastName-error" class="error-message"></span>
          </div>
          <div class="input-block">
            <input type="text" name="username"  id="username"   placeholder="Username">
            <span id="username-error" class="error-message"></span>
          </div>
          <div class="input-block">
            <input type="text" name="email"  id="email"  placeholder="E-mail">
            <span id="email-error" class="error-message"></span>
          </div>
          <div class="input-block">
            <input type="text" name="address" id="address"   placeholder="Adress">
            <span id="address-error" class="error-message"></span>
          </div>
          <div class="input-block">
            <input type="date" name="dob"  id="dob"   placeholder="Date of Birth">
            <span id="dob-error" class="error-message"></span>
          </div>
          <div class="input-block">
            <input type="password" name="pwd" id="pwd"   placeholder="Passwordh">
            <span id="password-error" class="error-message"></span>
          </div>
          <div class="input-block">
            <input type="password" name="pwd1"id="pwd1"    placeholder="Confirm Password">
            <span id="confirmPassword-error" class="error-message"></span>
          </div>
        <button type="submit"  class="btn-signup">Continue</button>
      </fieldset>
      </form>
    </div>
  </div>
</section>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
