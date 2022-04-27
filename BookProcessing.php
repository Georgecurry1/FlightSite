

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
    <input type="text" name="City" value="" placeholder="Please enter Departure City"><br><br>

    <label for="Destination">Destination:</label><br>
    <input type="text"  name="Destination" value="" placeholder="Please enter Destination"><br><br>

    <label for="Date">Departure Date:</label><br>
    <input type="date"  name="Date" value="" placeholder="Please enter date of travel"><br><br>

    <input type="submit" value="Submit"><!--link php-->
    <!--print out like a message saying conformation has been sent to email-->
  </fieldset>
  
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  //collect values of input field
  $city = $_REQUEST['City'];
  $dest = $_REQUEST['Destination'];
  $date = $_REQUEST['Date'];
  $newDate = date("m-d-Y", strtotime($date));//change format to match database's
  
  //estblish connection to insert data
$servername = "localhost";
$username = "root";
$password = "";

$db = mysqli_connect("$servername", "$username", "$password");

mysqli_select_db($db, 'bookflight'); 
session_start();

//search database (as long as user has any of these values corect, it will return all flights matching the right value in field)
$query = mysqli_query($db, "SELECT * FROM bookings WHERE Departure_City = '$city' OR Departure_Date = '$newDate' OR Destination = '$dest'");

if ($query) 
{
  //print tables from database on front end
  if (mysqli_num_rows($query) > 0) 
  { 
      echo "<table><tr><th>Departure_City</th><th>Departure_Date</th><th>Destination</th></tr>";
      // output data of each row
      while($row = $query->fetch_assoc())
      {
        echo "<tr><td>".$row["Departure_City"]."</td><td>".$row["Departure_Date"]."</td><td>".$row["Destination"]."</td></tr>";
      }
      echo "</table>";
  } 
  else 
  {
    echo 'not found';
  } 
}
}
?>



</body>
</html>