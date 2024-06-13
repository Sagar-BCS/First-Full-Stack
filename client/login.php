<?php
include "inloginnav.php";
include_once "all.html";
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['userpass']) && $_SESSION['manger'] == 'client'){
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" href="login.css">
    <title>E-Commerce | Client</title>
</head>

<body>
    <div class="fullbody">
        <div class="container1">
            <input type="checkbox" id="flip">
            <div class="cover">
                <div class="front">
                    <div class="text">
                        <span class="text-1">Every new friend is a <br> new adventure</span>
                        <span class="text-2">Let's get connected</span>
                    </div>
                </div>
                <div class="back">
                    <div class="text">
                        <span class="text-1">Complete miles of journey <br> with one step</span>
                        <span class="text-2">Let's get started</span>
                    </div>
                </div>
            </div>
            <div class="forms">
                <div class="form-content">
                    <div class="login-form">
                        <div class="title">Client Login</div>
                        <form action="lverify.php" method="POST">
                            <div class="input-boxes">
                                <div class="input-box">
                                    <i class="fas fa-envelope"></i>
                                    <input required type="text" placeholder="Username" name="uname">
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input required type="password" placeholder="Password" name="pass">
                                </div>
                                <div class="button input-box">
                                    <input type="submit" value="Login" name="logsubmit">
                                </div>
                                <div class="text sign-up-text">Don't have an account? <label for="flip">Register now</label></div>
                            </div>
                        </form>
                    </div>
                    <!-- Register Form  -->
                    <div class="signup-form">
                        <div class="title">Client Register</div>
                        <form action="lverify.php" method="POST">
                            <div class="input-boxes">
                                <div class="input-box">
                                    <i class="fas fa-user"></i>
                                    <input required type="text" placeholder="Username" name="uname">
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-envelope"></i>
                                    <input required type="email" placeholder="Email" name="umail">
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input required type="password" placeholder="Password" name="pass">
                                </div>
                                <div class="button input-box">
                                    <input type="submit" value="Register" name="regsubmit">
                                </div>
                                <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>