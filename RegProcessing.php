

<?php
// define variables and set to empty values
$nameErr = $passErr = $fNameErr = $LnameErr = $emailErr = $billingAddrErr = "";
$name = $pass = $fName = $Lname = $email = $billingAddr = "";

  //define test input function
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//if the data in the form is sent with post, lets check it then add to database
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["U"])) {
    $nameErr = "UserName is required";
  } else {
    $name = test_input($_POST["U"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["P"])) {
    $passErr = "Password is required";
  } else {
    $pass = test_input($_POST["P"]);
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$pass)) {
      $passErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["First"])) {
    $fNameErr = "First Name is required";
  } else {
    $fName = test_input($_POST["First"]);
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fName)) {
      $fNameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["Last"])) {
    $LnameErr = "Last name is required";
  } else {
    $Lname = test_input($_POST["Last"]);
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$Lname)) {
      $LnameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["Billing"])) {
    $billingAddrErr = "Billing Address is required";
  } else {
    $billingAddr = test_input($_POST["Billing"]);
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$billingAddr)) {
      $billingAddrErr = "Only letters and white space allowed";
    }
  }
  
  
}
  
?>

<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="./Styles.css" />
</head>
<body class="bckImage">
<h1>Register a new account here</h1>
<!--Sign up/Registration
Include Username, Password, FirstName, LastName, Email, Billing address-->
<!--Once regristation is complete, redirect user to the booking a flight page-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <fieldset>
    <legend>Register:</legend><br>
    <label class="err">**Required</label><br>
    <label for="User">**Username:</label><br>
    <input type="username" id="User" name="U" value="" placeholder="Please enter Username">
    <span class="error">* <?php echo $nameErr;?></span><br><br>

    <label for="Pass">**Password:</label><br>
    <input type="password" id="Pass" name="P" value="" placeholder="Please enter Password">
    <span class="error">* <?php echo $passErr;?></span><br><br>

    <label for="Fname">**First Name:</label><br>
    <input type="text" id="Fname" name="First" value=""placeholder="Please enter FirstName">
    <span class="error">* <?php echo $fNameErr;?></span><br><br>

    <label for="Lname">**Last Name:</label><br>
    <input type="text" id="Lname" name="Last" value=""placeholder="Please enter Lastname">
    <span class="error">* <?php echo $LnameErr;?></span><br><br>

    <label for="email">**Email</label><br>
    <input type="email" id="email" name="Email" value=""placeholder="Please enter Email">
    <span class="error">* <?php echo $emailErr;?></span><br><br>
    
    <label for="address">**Billing Address</label><br>
    <input type="text" id="address" name="Billing" value=""placeholder="Please enter Address">
    <span class="error">* <?php echo $billingAddrErr;?></span><br><br>

    <input type="submit" value="Submit">
    </fieldset>
</form>


</body>
</html>
