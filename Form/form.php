<?php
// All data imported from form.html
// Basic Data
$name = $_POST['Name']; // Name of person making the report
$resources = $_POST['Resources']; // Resources they require
$disaster = $_POST['Disaster']; // The type of disaster they're experiencing

// Location Data
$lat = $_POST['Lat']; // Latitude
$long = $_POST['Long']; // Logitude


// Database login details
include 'dbDetails.php';

// Create connection and insert data to database
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO issuesrecorded (Name, Resources, Disaster, Latitude, Longitude)
  VALUES ('$name', '$resources', '$disaster', '$lat', '$long')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

// Terminate Connection
$conn = null;
//Redirect to form page
header('Location: index.html')
?>