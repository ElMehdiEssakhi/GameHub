<?php
session_start();

$conn = new mysqli("localhost", "root", "", "gamehub");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user=$_POST["username"];
    $pass=$_POST["password"];
    $sql="SELECT `password` FROM users WHERE username='$user'";
    $result=$conn->query($sql);
    if($result->num_rows==1){
        $row=$result->fetch_assoc();
        $pw=$row['password'];
        if($pw===$pass){
            $_SESSION["username"]=$user;
            header("location:welcom_gh.php");
        }else{
             echo("wrong password");
        }
    }else{
        echo("no such person");
    }
}

$conn->close();
?>