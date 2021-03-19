<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/stylesign.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/signup-image.jpg" alt="sing up image"></figure>
                        <a href="./signin.html" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<?php
if(isset($_POST['signup'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $re_pass = $_POST['re_pass'];
    if(!isset($_POST['agree-term'])){
        echo "<script>alert('need to tick the agreements')</script>";
    }
}
if(strlen($password)<8){
    exit('password should be at least 8<a href="javascript:history.back(-1);">retry</a>');
}
if($password == $re_pass){
    $connection = mysqli_connect('127.0.0.1','root','','newDB');
    if(!$connection){
        die("Fail to connect: " . mysqli_connect_error());
    }
    $check = mysqli_query("SELECT username FROM user WHERE username = '$username' LIMIT 1");
    if(mysqli_fetch_array($check)){
        echo 'username already exists.<a href="javascript:history.back(-1);">retry</a>';
        exit;
    }
    $password = md5($password);
    $sql = "INSERT INTO user(username,'password',email)VALUE('$username','$password','$email')";
    $result = mysqli_query($connection,$sql);
    if($result){
        exit('click here<a href="signin.php"> to log in</a>');
    }else{
        echo 'click<a href="javascript:history.back(-1);">retry</a>';
    }
}
else{
    echo 'passwords do not match<a href="javascript:history.back(-1);">retry</a>';
}
?>