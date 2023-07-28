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


?>
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
      <form class="form form-login">
        <fieldset>
          <legend>Please, enter your email and password for login.</legend>
          <div class="input-block">
            <label for="login-email">E-mail</label>
            <input id="login-email" type="email" required>
          </div>
          <div class="input-block">
            <label for="login-password">Password</label>
            <input id="login-password" type="password" required>
          </div>
        </fieldset>
        <button type="submit" class="btn-login">Login</button>
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup">     
        <span class="underline"></span>
      </button>
      <form class="form form-signup">
        <fieldset>
          <legend>Please, enter your email, password and password confirmation for sign up.</legend>
          <div class="input-block">
            <input type="text"  name="firstName" id="firstName"    placeholder="First Name">
          </div>
          <div class="input-block">
            <input type="text"   name="lastName" id="lastName"  placeholder="Last Name">
          </div>
          <div class="input-block">
            <input type="text" name="username"  id="username"   placeholder="Username">
          </div>
          <div class="input-block">
            <input type="text" name="email"  id="email"  placeholder="E-mail">
          </div>
          <div class="input-block">
            <input type="text" name="address" id="address"   placeholder="Adress">
          </div>
          <div class="input-block">
            <input type="date" name="dob"  id="dob"   placeholder="Date of Birth">

          </div>
          <div class="input-block">
            <input type="password" name="pwd" id="pwd"   placeholder="Passwordh">
          </div>
          <div class="input-block">
            <input type="password" name="pwd"id="pwd"    placeholder="Confirm Password">
          </div>
        <button type="submit" class="btn-signup">Continue</button>
      </fieldset>
      </form>
    </div>
  </div>
</section>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
