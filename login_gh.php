<?php
session_start();

$conn = new mysqli("localhost", "root", "", "gamehub");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$fb="before";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST["username"]) && !empty($_POST["password"])){
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
                $fb="wrong";
            }
        }else{
            $fb="noone";
        }
    }else{
        $fb="emty";
    }
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
        #loginwin{
            border-radius:8px ;
            width: 20vw;
            background:#f1f7fe ;
            padding: 0;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 5px 5px 15px 0px black;

        }
        #loginform{
            display: flex;
            text-align: center;
            padding: 32px 24px 24px;
            gap: 16px;
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
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }
        .finallogin {
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
        .finallogin:hover{
            scale: 1.05;
            background-color: #e8120b;
        }
        #tosignup{
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
        function tosignup(){
            window.location.href="sign_gh.php"
        }
    </script>
</head>
<body>
        <div class="pop" id="loginwin" >
            <form id="loginform" class="t9yad" action="login_gh.php" method="post" >
                <span class="onwan">Log In</span>
                <div class="infos">
                    <input class="input" id="usernamel" type="text" placeholder="Username" name="username" value="<?php if(!empty($user)){echo $user;} ?>">
                    <input class="input" id="lgpassword" type="password" placeholder="Password" name="password">
                </div>
                <button class="finallogin" type="submit">Log In</button>
                <div class="feedback" id="loginfeedback">
                <?php if($fb=="noone"): ?>
                    <p>No such person</p>
                <?php elseif($fb=="wrong"): ?>
                    <p>Wrong password </p>
                <?php elseif($fb=="emty"): ?>
                    <p>Please enter a valid username </p>
                <?php endif; ?>
                </div>
            </form>
            <div class="tologin">
                <p>Dont have an account?<button id="tosignup" onclick="tosignup()" >Sign Up</button></p>
            </div>
        </div>
</body>
</html>