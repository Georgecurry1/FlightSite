<?php

    
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  // collect values of input field
//if user does not exist in database, show result on html page

  $user = $_REQUEST['Username'];
  $pass = $_REQUEST['Password'];
  

//if user does exist, change page to bookflight.html
}
?>






<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./Styles.css" />
</head>
<body class="bckImage">
<h1>Universal Airlines Main Page</h1>
<p>We are proud to be serving the world with our state of the art aircraft.
From the top of the line pilot to the comfortable leather seats, we are here to accommodate all of your needs.
</p><br>

<p>Returning User? Please login using your username and password below</p>
<!--Log in
Use Username and Password to access your account
Under your account, you should view your trip after booking one
Also I could implement some validation for password (must meed curtain criteria)-->
<form method="post" action="./MainProcessing.php">
    <fieldset>
    <legend>Login:</legend><br>
    <label for="User">Username:</label><br>
    <input type="username" id="User" name="Username" value="" placeholder="Please enter Username"><br><br>

    <label for="Pass">Password:</label><br>
    <input type="password" id="Pass" name="Password" value="" placeholder="Please enter Password"><br><br>

    <input type="submit" value="Submit"><!--link php-->
  </fieldset>
</form>

<!--Have a button that the user will press to create a new account (link with regristaion)-->

<P>Need an account? Click the button below to register!</P>
<button type ="button" onclick="Continue()" >Register</button>

<!--i need this to go to the next page-->
<script>
    function Continue()
    {
      window.location.href = "./Registration.html";
    }
</script>

</body>
</html>