<?php
$servername = "localhost"; 
$username = "root";         
$password = "";            
$dbname = "databasekic";  

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $village = $_POST['village'];
    $proper_location = $_POST['proper_location'];

    $stmt = $conn->prepare("INSERT INTO soil_test_details (name, email, phone, city, district, village, proper_location) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $phone, $city, $district, $village, $proper_location);

    if ($stmt->execute()) {
        echo "Data submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
