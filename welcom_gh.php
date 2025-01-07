<?php 
session_start();              
if (!isset($_SESSION['username'])) {
    header("Location: login_gh.php");
    exit();
}
$name=$_SESSION["username"]; 
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="gamehub.css">
    <title>GameHub</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="gamehub.js"></script>
    <script>
        function kill(){
            window.location.href = "logout.php";
        }
    </script>
    <style>
        #wlcmsg{
        color: white;
        font-family: "Open Sans", sans-serif;
        }
        #logoutbut{
            font-size: 16px;
            border-radius: 100px;
            border: none;
            padding: 8px 15px 8px 15px ;
            background-color: #d00000;
            color: #ffffff;
            transition: all 0.5s;
            cursor: pointer;
        }
        #btnkhroj{
            display: flex;
            align-items: center;
            justify-content:space-around;
            width: 20%;
        }
    </style>
</head>

<body style="background-color: #212529;">
    <header style="background-color: rgb(0, 0, 0);">
    <div id="up">
            <div id="tswirawtitle">
                <div><img class="logo" src="picsgamehub/posters/logo.png" alt="GameHub"></div>
                <div id="onwan">GAMEHUB</div>
            </div>
            <div id="btnkhroj">   
                <div id="wlcmsg" ><?php echo("welcome, $name");?></div>
                <div><button id="logoutbut" onclick="kill()">Log out</button></div>
            </div>    
        </div>
    </header>
    <div class="lmain" >
            <div class="menu">
                    <div class="menu-item"> <button type="button" class="botonat">Home</button> </div>
                    <div class="menu-item"> <button type="button" class="botonat">Game News</button></div>
                    <div class="menu-item"> <button type="button" class="botonat" onclick="window.location.href='Q&A.php'">Need Help</button> </div>
                    <div class="menu-item"> <button type="button" class="botonat">Support Us</button> </div>
            </div>
    <input id="search" type="text" placeholder="Search For Games">
    <p></p>
    <div class="games">
                <div ><a href="eldenring.html"><img src="picsgamehub/posters/elden ring.jpg"><p class ="smya" style="display: none;">ELDEN RING</p></a></div> 
                <div ><a href="thewitcher3.html"><img src="picsgamehub/thewitcher3/the witcherp.jpg"  ><p class ="smya" style="display: none;">THE WITCHER 3</p></a></div>
                <div ><a href="cyberpunk.html"><img src="picsgamehub/posters/cyberpunk.jpg"  ><p class ="smya" style="display: none;">CYBERPUNK 2077</p></a></div>
                <div ><a href="doom.html"><img src="picsgamehub/doom/doomp.jpg"  ><p class ="smya" style="display: none;">DOOM ETERNAL</p></a></div>
                <div ><a href="arkhamcity.html"><img src="picsgamehub/posters/btmn.jpg"><p class ="smya" style="display: none;">BATMAN ARKHAM CITY</p></a></div>
                <div ><a href="reddead2.html"><img src="picsgamehub/posters/Reddeadcover.webp"  ><p class ="smya" style="display: none;">RED DEAD REDEMPTION II</p></a></div>
                <div ><a href="bannerlord.html"><img src="picsgamehub/posters/m&b.jpg"  ><p class ="smya" style="display: none;">MOUNT&BLADE BANNERLORD</p></a></div>
                <div ><a href="outlast.html"><img src="picsgamehub/outlast/outlastp.jpg"  ><p class ="smya" style="display: none;">OUTLAST</p></a></div>
                <div ><a href="theforest.html"><img src="picsgamehub/the forest/theforestp.jpg"><p class ="smya" style="display: none;">THE FOREST</p></a></div>
                <div ><a href="daysgone.html"><img src="picsgamehub/days gone/daysgonep.jpg"  ><p class ="smya" style="display: none;">DAYS GONE</p></a></div>
                <div ><a href="dyinglight.html"><img src="picsgamehub/posters/dying light.jpg"  ><p class ="smya" style="display: none;">DYING LIGHT</p></a></div>
                <div ><a href="mafia.html"><img src="picsgamehub/posters/mafia.jpg"  ><p class ="smya" style="display: none;">MAFIA 1</p></a></div>
    </div>
    <br><br>
</div>
</body>
</html> 