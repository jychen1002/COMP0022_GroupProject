<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Directing Template">
    <meta name="keywords" content="Directing, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie List</title>

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

<body class="ov-hid—popular">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header header--normal">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/footer-logo.png" width="50%" height="50%" lt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="./index.php">SEARCHING</a>
                                <li><a href="./ShowMovieList.php">LISTING</a>
                                <li><a href=#>RANKING</a>
                                    <ul class="dropdown">
                                        <li><a href="./popular.php">THE MOST POPULAR FILMS</a></li>
                                        <li><a href="./polarising.php">THE MOST POLARISING FILMS</a></li>
                                    </ul>
                            </ul>
                        </nav>
                        <?php session_start();?>
                        <?php if(!$_SESSION['user']){ ?>
                        <div class="header__menu__right">
                            <a href="signin.php" class="login-btn"><i class="fa fa-user"></i></a>
                        </div><?php }else{ ?>
                        <div class="header__menu__right">
                            <a href="signin.php?action=logout" class="login-btn"><i class="fa fa-sign-out-alt"></i></a>
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
    
 <!-- Listing Section Begin -->
    <section class="listing nice-scroll">
        <div id = "1">
            <div class="listing__text__top">
                <div class="listing__text__top__left">
                  <h5>The Movie List</h5>
                </div>
                <div class="listing__text__top__right" id = "topright_1">
                    <a><img src="img/Group 12.png"alt="" width = "40%" height = "40%" id = "imgclick1" ></a>
                    <a><img src="img/Path 10.png" alt="" width = "30%" height = "30%" id = "imgclick2"></a>
                </div>
                <div class="listing__text__top__right" id = "topright_2" style="display:none">
                    <a><img src="img/Group 12.png"alt="" width = "40%" height = "40%" id = "imgclick1" ></a>
                    <a><img src="img/Path 10.png" alt="" width = "30%" height = "30%" id = "imgclick2"></a>
                </div>
            </div>
    
            <div class="listing__list">
            <?php
              $connection = mysqli_connect('127.0.0.1','admin','[password]','newDB');
              $query = "SELECT*FROM movies_info";
              $result = mysqli_query($connection,$query)
                or die('Error making select users query' . mysql_error());
              
              while ($row = mysqli_fetch_array($result)){
                $movie_id = $row['movieId'];
                echo '<div class="listing__item">
                <img src= "'.$row['imglink'].'">
                <div class="listing__item__text">
                    <div class="listing__item__text__inside">
                        <h5 onclick = "to_report('.$movie_id.')">'.$row['title'].'</h5>
                        <div class="listing__item__text__rating">
                            <div class="listing__item__rating__star">
                                <h5>'.$row['year'].'</h5>
                            </div>
                        </div>
                    </div>
                </div>
              </div>';
                }
                mysqli_free_result($result);
                mysqli_close($connection);
            ?>
            </div>
        </div>
    <div id = "2" style="display:none" >
        <div class="listing__text__top">
            <div class="listing__text__top__left">
                <h5>The Movie List</h5>
            </div>
            <div class="listing__text__top__right" id = "topright_1" style="display:none">
                <a><img src="img/Group 12.png" width = "40%" height = "40%" id = "imgclick1" ></a>
                <a><img src="img/Path 10.png"  width = "30%" height = "30%" id = "imgclick2"></a>
            </div>
            <div class="listing__text__top__right" id = "topright_2" >
                <a><img src="img/Path 11.png"  width = "30%"  height = "30%" id = "imgclick3" ></a>
                <a><img src="img/Group 13.png" width = "40%" height = "40%" id = "imgclick4"></a>
            </div>
        </div>
        <div class="listing__list">
            <div class="container">
                <div class="row">
                    <table class="table">
                    <thead>
                            <tr>
                                <th scope="col" style="width: 5%;">Movie ID</th>
                                <th scope="col">Movie Name</th>
                                <th scope="col">Year</th>
                                <th scope="col">Average Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $connection = mysqli_connect('127.0.0.1','admin','[password]','Movie_Database');
                                $sql="SELECT movies_info.title AS NEWT, movies_info.movieId AS NEWI, movies_info.year AS NEWY, RT.AVERAGE AS NEWA, RT.CT AS NEWC FROM (SELECT movieId AS ID, AVG(rating) AS AVERAGE, COUNT(movieId) AS CT from ratings GROUP BY movieId) as RT INNER JOIN movies_info ON RT.ID = movies_info.movieId ORDER BY movies_info.movieId";
                                $result=mysqli_query($connection,$sql);
                                if(!$result){
                                    die('Cannot read data!'.mysqli_error($connection));        
                                }
                                while($row=mysqli_fetch_array($result)){
                                    echo'<tr>
                                        <th scope="row">'.$row['NEWI'].'</th>
                                        <td> '.$row['NEWT'].'</td>
                                        <td>'.$row['NEWY'].'</td>
                                        <td>'.$row['NEWA'].'</td>
                                        </tr>';
                                }
                                mysqli_free_result($result);
                                mysqli_close($connection);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Listing Section End -->
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $("#imgclick2").click(function(){
        console.log("click")
            $('#2').show().siblings('div').hide();
        });
    });

    $(document).ready(function(){
        $("#imgclick3").click(function(){
            console.log("click2");
            $('#1').show().siblings('div').hide();
        })
    })
        </script>
         <script type="text/javascript">
            function to_report(e){
                window.location.href = "../report.php?movieId="+e;
            }
        </script>
    <script src="js/bootstrap.min.js"></script>
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