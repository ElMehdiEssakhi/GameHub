
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
                <?php 
                    session_start();
                    $name=$_SESSION["username"];                    
                ?>    
                <div id="wlcmsg" ><?php echo("welcome, $name");?></div>
                <div><button id="logoutbut" onclick="kill()">Log out</button></div>
            </div>    
        </div>
        <dialog class="pop" id="signuppop">
            <div class="close"><button type="button" style="font-weight: 800;">X</button></div>
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
                <button id="signbutton" class="finalsignup" type="submit">Sign Up</button>
                <div class="feedback" id="signupfeedback"></div>
            </form>
            <div class="login">
                <p>Already have an account?<button class="toto" id="tologin" >Log in</button></p>
            </div>
        </dialog>
        <dialog class="pop" id="loginpop" >
            <div class="close"><button type="button" style="font-weight: 800;">X</button></div>
            <form id="loginform" class="t9yad" action="login_gh.php" method="post" >
                <span class="onwan">Log In</span>
                <div class="infos">
                    <input class="input" id="usernamel" type="text" placeholder="Username" name="username">
                    <input class="input" id="lgpassword" type="password" placeholder="Password" name="password">
                </div>
                <button class="finalsignup" type="submit">Log In</button>
                <div class="feedback" id="loginfeedback"></div>
            </form>
            <div class="login">
                <p>Dont have an account?<button class="toto" id="tosignup" >Sign Up</button></p>
            </div>
        </dialog>
    </header>
    <div class="lmain" >
            <div class="menu">
                    <div class="menu-item"> <button type="button" class="botonat">Home</button> </div>
                    <div class="menu-item"> <button type="button" class="botonat">Game News</button></div>
                    <div class="menu-item"> <button type="button" class="botonat">Need Help</button> </div>
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