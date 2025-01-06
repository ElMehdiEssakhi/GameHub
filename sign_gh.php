<?php
session_start();

$conn = new mysqli("localhost", "root", "", "gamehub");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$fb="before";
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
                $_SESSION["username"]=$username;
                header("location:welcom_gh.php");
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            height: 97vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url(picsgamehub/login_bg.jpg);
            background-size: cover;
        }
        #signwin{
            border-radius:8px ;
            width: 20vw;
            height: 70vh;
            background:#f1f7fe ;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            box-shadow: 5px 5px 15px 0px black;
            min-width: 250px;
            min-height: 400px;

        }
        #signform{
            display: flex;
            text-align: center;
            padding: 32px 24px 24px;
            gap: 5px;
            flex-direction: column;
            align-items: center;
        }
        .onwan{
            display: flex;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
            font-weight:700;
            font-size: 25px;
        }
        .infos{
            width: 100%;
            margin: 20px 15px;
            overflow: hidden;
            border-radius: 8px;
        }
        #fullnameinput{
            display: flex;
        }
        #lname{
            border-left:1px solid #eee ;
        }
        .input{
            border: none;
            width: 100%;
            height: 40px;
            border-bottom: 1px solid #eee;
            padding: 1px 11px;
        }
        .tologin{
            background-color: #fde8e8;
            padding: 6px;
            margin: 0px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }
        .finalsign {
            background-color: #f90d06;
            color: #fff;
            border: 0;
            border-radius: 24px;
            padding: 10px 16px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .3s ease;
        }
        .finalsign:hover{
            scale: 1.05;
            background-color: #e8120b;
        }
        #tologin{
            border: none;
            background: none;
            cursor: pointer;
            color: red;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
        }
        .feedback{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 600;
        }
    </style>
    <script>
        function tologin(){
            window.location.href="login_gh.php"
        }
        document.addEventListener('DOMContentLoaded', function() {
            const submit=document.querySelector(".finalsign");
            
            submit.addEventListener("click", function(event){
                const firstname=document.getElementById("fname").value;
                const lastname=document.getElementById("lname").value;
                const email=document.getElementById("email").value;
                const pass=document.getElementById("password").value;
                const cfpass=document.getElementById("cfpassword").value;
                if(!firstname||!lastname||!email||!pass||!cfpass){
                    event.preventDefault();
                    document.getElementById("signupfeedback").innerHTML="please fill all the fields"
                }
                if(pass!==cfpass){
                    event.preventDefault();
                    document.getElementById("signupfeedback").innerHTML="please confirm the password"
                }
            })  
        });
        
    </script>
</head>
<body>
        <div class="pop" id="signwin" >
            <form id="signform" class="t9yad" action="sign_gh.php" method="post" >
                <span class="onwan">Sign Up</span>
                <div class="infos">
                    <div id="fullnameinput">
                        <input class="input" id="fname" type="text" placeholder="First Name" name="fname">
                        <input class="input" id="lname" type="text" placeholder="Last Name" name="lname">
                    </div>
                    <input class="input" id="usernames" type="text" placeholder="Username" name="username">
                    <input class="input" id="email" type="email" placeholder="Email" name="email">
                    <input class="input" id="password" type="password" placeholder="Password" name="password">
                    <input class="input" id="cfpassword" type="password" placeholder="Confirm Password" name="cfpassword">
                </div>
                <button class="finalsign" type="submit">Sign Up</button>
                <div class="feedback" id="signupfeedback">
                </div>
            </form>
            <div class="tologin">
                <p>Already have an account?<button id="tologin" onclick="tologin()" >Log In</button></p>
            </div>
        </div>
</body>
</html>