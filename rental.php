<!DOCTYPE HTML>  
<html>
<head>
<title>
rental

</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$bhkErr =  "";
$bhk = $area = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["bhk"])) {
    $bhkErr = "Answer is required";
  } else {
    $bhk = test_input($_POST["bhk"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Question 5</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 Area: <br>
  <input type="radio" name="area" <?php if (isset($area) && $bhk=="area1") echo "checked";?> value="bhk1">area1 <br>
  <input type="radio" name="area" <?php if (isset($area) && $bhk=="area2") echo "checked";?> value="bhk2">area2 <br>
  <input type="radio" name="area" <?php if (isset($area) && $bhk=="area3") echo "checked";?> value="bhk3">area3 <br>
  <input type="radio" name="area" <?php if (isset($area) && $bhk=="area4") echo "checked";?> value="bhk3">area4 <br>
  <span class="error">* <?php echo $bhkErr;?></span>
  <br><br>
  <br>
  BHK: <br>
  <input type="radio" name="bhk" <?php if (isset($bhk) && $bhk=="bhk1") echo "checked";?> value="bhk1">bhk1 <br>
  <input type="radio" name="bhk" <?php if (isset($bhk) && $bhk=="bhk2") echo "checked";?> value="bhk2">bhk2 <br>
  <input type="radio" name="bhk" <?php if (isset($bhk) && $bhk=="bhk3") echo "checked";?> value="bhk3">bhk3 <br>
  <input type="radio" name="bhk" <?php if (isset($bhk) && $bhk=="bhk4") echo "checked";?> value="bhk3">bhk4 <br>
  <span class="error">* <?php echo $bhkErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, area, info FROM property WHERE area=$area AND id=$bhk";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Details: " . $row["id"] ." - Name: " . $row["name"]. " " . $row["area"]. " " . $row["info"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
