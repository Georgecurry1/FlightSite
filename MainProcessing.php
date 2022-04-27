<?php
// define variables and set to empty values
$nameErr = $passErr = "";
$name = $pass ="";

//if the data in the form is sent with post, lets check if it exist in database
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
 //estblish connection to insert data
$servername = "localhost";
$username = "root";
$password = "";

//Search database to see if username and password exist in database, if yes then go to the book flight page!
$db = mysqli_connect("$servername", "$username", "$password");

mysqli_select_db($db, 'bookflight'); 
session_start();

$username = $_POST['Username'];
$password = $_POST['Password'];

//search database
$query = mysqli_query($db, "SELECT * FROM useraccount WHERE username = '$username' AND OfficialPassword = '$password'");

if ($query) 
{
  if (mysqli_num_rows($query) > 0) 
  { 
    //user exist, take them to next page
    header ('Location: ./BookProcessing.php');
  } 
  else 
  {
    echo 'not found';
  }
} 
else 
{
  echo 'Error: '.mysqli_error($db);
}

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
    <input type="username"  name="Username" value="" placeholder="Please enter Username"><br><br>
    <span class="error">* <?php echo $nameErr;?></span><br><br>

    <label for="Pass">Password:</label><br>
    <input type="password"  name="Password" value="" placeholder="Please enter Password"><br><br>
    <span class="error">* <?php echo $passErr;?></span><br><br>

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
      window.location.href = "./RegProcessing.php";
    }
</script>

</body>
</html>