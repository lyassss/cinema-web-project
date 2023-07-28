

<?php

include '../Controller/CustomerC.php';

$error = "";

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
    isset($_POST["pwd"])&&
    isset($_POST["Role"])
) {
    if (
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["username"]) &&
        !empty($_POST["address"]) &&
        !empty($_POST["dob"]) &&
        !empty($_POST["pwd"])&&
        !empty($_POST["Role"])     
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
            $_POST['Role'],
        );
        $customerC->addCustomer($customer);
        // header('Location:ListCustomers.php');
        header('Location:login.php');
    } else
        $error = "Missing information";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "icon" href ="images/logo.png" type = "image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <style>
      body{
          background-image:url(../user.jpg);
          background-size: 1600px;
        }
      .error {
       border: 2px solid red;
      }
      .error-message {
        display: block;
        color: red;
      }
      .success {
        border: 2px solid green;
      }
    </style>
   <title> Sign-Up</title>
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
          var roleInput = document.getElementById("Role");
          var firstNameError = document.getElementById("firstName-error");
          var lastNameError = document.getElementById("lastName-error");
          var usernameError = document.getElementById("username-error");
          var emailError = document.getElementById("email-error");
          var addressError = document.getElementById("address-error");
          var dobError = document.getElementById("dob-error");
          var passwordError = document.getElementById("password-error");
          var confirmPasswordError = document.getElementById("confirmPassword-error");
          var roleError = document.getElementById("Role-error");
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
        if (roleInput.value.trim() === "") {
            roleError.innerHTML = "Le champ role doit être rempli";
            roleError.style.display = "block";
            roleInput.style.border = "1px solid red";
            isValid = false;
          } else {
            roleError.style.display = "none";
            roleInput.style.border = "";
          }
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

</head>
<body>

<div class="container">
    <form id="form" class="form" autocomplete="off" method="POST" >
    <pre><h1 id="formName">        ADD USER  </h1></pre>
    <div class="form-control">
        <input type="text"  name="firstName" id="firstName" placeholder="First Name" size="5" >
        <span id="firstName-error" class="error-message"></span>
        <input type="text" name="lastName" id="lastName" placeholder="Last Name"size="5" >
        <span id="lastName-error" class="error-message"></span>
        <input type="text" name="username" id="username" placeholder="Username"size="5" >
        <span id="username-error" class="error-message"></span>
        <input type="text" name="email" id="email" placeholder="E-mail"size="5" >
        <span id="email-error" class="error-message"></span>
        <input type="text" name="address" id="address" placeholder="Adress"size="5" >
        <span id="address-error" class="error-message"></span>
        <input type="date" name="dob" id="dob" placeholder="Date of Birth"size="5" >
        <span id="dob-error" class="error-message"></span>
    </div>
          <div class="form-control">
        <input type="password" name="pwd" id="pwd" placeholder="Password" >
        <span id="password-error" class="error-message"></span>
        <input type="password" name="pwd1" id="pwd1" placeholder="Confirm Password">
        
        <span id="confirmPassword-error" class="error-message"></span>
       <label>
        <input type="radio" name="Role" id="Role" value="client">client
       </label>
       <label>
        <input type="radio" name="Role" id="Role" value="admin">admin
       </label>
       <label>
        <input type="radio" name="Role" id="Role"  value="employe">employe
       </label>
       
       <span id="Role-error" class="error-message"></span>
        </div>
     
    <button type="submit"onclick="return validateForm()">Valider</button>
  
  
    <a href="login.php">Login if you have an account</a>
    <a href="../../chatbot/bot.php"></a>
    </form>
</div>
 
    <!-- <script src="views/app.js"></script> -->
</body>
</html>