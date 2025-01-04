<?php


$conn = new mysqli("localhost", "root", "", "gamehub");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $fuser=$_POST["fname"];
    $luser=$_POST["lname"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $pass=$_POST["password"];

    $sql = "INSERT INTO users (`first name`,`last name`,`username`,`email`,`password`) VALUES (?,?, ?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fuser,$luser,$username, $email, $pass);
    if ($stmt->execute()) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>