<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Directing Template">
    <meta name="keywords" content="Directing, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Directing | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" width="50%" height="50%" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">                 
                            <ul>
                                <li><a href="./ShowMovieList.php">LISTING</a>
                                <li><a href=#>RANKING</a>
                                    <ul class="dropdown">
                                        <li><a href="./popular.php">THE MOST POPULAR FILMS</a></li>
                                        <li><a href="./polarising.php">THE MOST POLARISING FILMS</a></li>
                                    </ul>
                                <li><a href="./prediction.php">PREDICTIONS</a>
                            </ul>
                        </nav>
                        <?php session_start();?>
                        <?php if(!$_SESSION['user']){ ?>
                        <div class="header__menu__right">
                            <a href="signin.php" class="login-btn"><i class="fa fa-user"></i></a>
                        </div><?php }else{ ?>
                        <div class="header__menu__right">
                            <a href="signin.php?action=logout">LOG OUT</a>
                        </div><?php
                            if($_GET['action'] == "logout"){
                                $_SESSION = array();
                                session_destroy();
                                echo "<script>location.href='signin.php';</script>";
                            }
                        }?>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero set-bg" data-setbg="img/bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__text">
                        <div class="section-title">
                            <h2>FIND MOVIE INFORMATION</h2>
                            <p>1.118.940.376 The best service package is waiting for you</p>
                        </div>
                        <div class="hero__search__form">
                            <form action="listing.php" method="post">
                                <input type="text" placeholder="Search..." name="keywords">
                                <div class="select__option">
                                    <select name="select_option">
                                        <option value="">--Please choose an option--</option>
                                        <option value="1">Movie name</option>
                                        <option value="2">Genres</option>
                                        <option value="3">Tags</option>
                                    </select>
                                </div>
                                <button type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                        <div class="footer__copyright__links">
                            <a href="#">COMP0022 GROUP7</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

     
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Js Plugins
    <script>
        $(document).ready(function(){
          $("button").click(function(){
          });
        });
        </script>
    -->
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>