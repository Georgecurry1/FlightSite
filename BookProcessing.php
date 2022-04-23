<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  //collect values of input field
  $city = $_REQUEST['city'];
  $dest = $_REQUEST['Dest'];
  $date = $_REQUEST['d'];
  
  

  //check to see if these show up in database
  //if not then display "There are no abaliable flights within the specified field of search"
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./Styles.css" />
</head>
<body class="bckImage">
<h1>Booking a flight</h1>
<h3>Please enter your information so we can get you a flight as soon as possible! </h3>
<h3>Thank you for using Universal Airlines!</h3>
<!--Booking a flight
Should include: Departure City, Destination, Departure date-->
<form method="post" action="./BookProcessing.php">
    <fieldset>
    <legend>Booking a Flight:</legend><br>
    <label for="City">Departure City:</label><br>
    <input type="text" id="City" name="city" value="" placeholder="Please enter Departure City"><br><br>

    <label for="Destination">Destination:</label><br>
    <input type="text" id="Destination" name="Dest" value="" placeholder="Please enter Destination City"><br><br>

    <label for="Date">Departure Date:</label><br>
    <input type="date" id="Date" name="d" value="" placeholder="Please enter date of travel"><br><br>

    <input type="submit" value="Submit"><!--link php-->
    <!--print out like a message saying conformation has been sent to email-->
  </fieldset>
</form>





</body>
</html>