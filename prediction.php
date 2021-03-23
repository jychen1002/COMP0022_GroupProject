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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap-tagsinput.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-tagsinput.css" />
</head>

<body class="ov-hid-popular">
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
                        <a href="./index.html"><img src="img/footer-logo.png" width="50%" height="50%" lt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="./index.php">SEARCHING</li>
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

    <!-- Listing Section Begin -->
        <section class="listing nice-scroll">
            <div class="listing__text__top">
                <div class="listing__text__top__left">
                    <h3 style="font-weight:800;">Predicting rating</h3>
                    <p>Predicting the likely viewer ratings for a soon-to-be-released film by entering movie's genres and tags </p>
                </div>
            </div>
            <div class="listing__list">
                <table class="table table-sm table-borderless mb-0">
                    <tbody>
                    <form action="prediction.php" method="post">
                        <tr>
                             <th class="pl-0 w-25" scope="row"><strong>Tags:</strong></th>
                             <td><input type="text" name="tag" placeholder="Input tags seperated by comma"></td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Genres:</strong></th>
                                <td><input type="text" name="genre" placeholder="Input genres seperated by comma"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                <input type="submit" value="Submit">
                                </td>
                            </tr>
</form>
                            <?php
                            $connection = mysqli_connect('127.0.0.1','root','12345678','newDB');
                            if(!$connection){
                                die("Fail to connect: " . mysqli_connect_error());
                            }
                            $tag = $_POST['tag'];
                            $tag_list = explode(',',$tag);
                            $genre = $_POST['genre'];
                            $genre_list = explode(',',$genre);
                            $length = count($genre_list);?>
                            <?php
                            function format($condition){
                                return("'" . $condition . "'");
                            }
                            $temp = implode(",", array_map("format", $tag_list));
                            $tag_sql = "SELECT AVG(R.rating) AS AverageScore FROM ratings R
                            JOIN tags T ON R.movieId = T.movieId
                            WHERE T.tag IN ($temp)";
                            $res = mysqli_query($connection,$tag_sql);
                            $row = mysqli_fetch_array($res);
                            if(!$res){
                                die('Cannot read data!'.mysqli_error($connection));
                            }
                            echo " <tr><th>Mean Score By Tag</th><td>${row['AverageScore']}</td>";
                            //average rating of movie with single genre
                            if($length == 1){
                                $sql = "SELECT AVG(R.rating) AS AverageScore FROM ratings R 
                                JOIN genres G 
                                ON R.movieId = G.movieId
                                WHERE G.genre = '$genre' AND G.movieId IN (SELECT movieId FROM genres GROUP BY movieId HAVING COUNT(movieId) = 1)";
                                $result = mysqli_query($connection,$sql);
                                $row = mysqli_fetch_array($result);
                                if(!$result){
                                    die('Cannot read data!'.mysqli_error($connection));
                                }
                                echo " <tr>
                            <th>Mean Score By Genre</th>
                            <td>${row['AverageScore']}</td>";
                            }
                            //multiple genres
                            else{
                                $con = implode(",", array_map("format", $genre_list));
                                $sql = "SELECT AVG(R.rating) AS AverageScore FROM ratings R 
                                JOIN genres G 
                                ON R.movieId = G.movieId
                                WHERE G.movieId IN (SELECT movieId FROM genres WHERE genre IN ($con) GROUP BY movieId HAVING COUNT(movieId) = $length)";
                                $result = mysqli_query($connection,$sql);
                                $row = mysqli_fetch_array($result);
                                if(!$result){
                                    die('Cannot read data!'.mysqli_error($connection));
                                }
                                echo " <tr>
                            <th>Mean Score By Genre</th>
                            <td>${row['AverageScore']}</td>";
                            }
                            ?>
                            </tr>
                        </tbody>
                    </table>
                    </a>
                </div>
                <div class="listing__text__top">
                    <div class="listing__text__top__left">
                        <h3 style="font-weight:800;">Personality Traits</h3>
                        <p>Predicting the personality traits of viewers who will give a high rating to a soon-to-be-released film by entering movie's genres.
                            This will give five assessment score from 1 to 7 describing user's personality traits. (1 means the user does not have such a tendency, and 7 means the user has such a tendency.) </p>
                        <p>Openness: tendency to prefer new experience.</p>
                        <p>Agreeableness: tendency to be compassionate and cooperative.</p>
                        <p>Emotional Stability: tendency to NOT have psychological stress.</p>
                        <p>Conscientiousness: tendency to be organized and dependable, and show self-discipline</p>
                        <p>Extraversion: tendency to be outgoing</p>
                        
                    </div>
                </div>
                <div class="listing__list">
                    <table class="table table-sm table-borderless mb-0" style="padding-bottom:30px">
                        <tbody>
                        <form action="prediction.php" method="post">
                            <tr>

                                 <th class="pl-0 w-25" scope="row"><strong>Genres:</strong></th>
                                 <td><input type="text" name="personality_genre" placeholder="Input genres seperated by comma"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    <input type="submit" value="Submit">
                                    </td>
                                </tr>
                                </form>
                                <?php
                                $genre = $_POST['personality_genre'];
                                $genre_list = explode(',',$genre);
                                $length = count($genre_list);
                                if($length == 1){
                                    $sql = "SELECT AVG(P.openness) AS Openness, AVG(P.agreeableness) AS Agreeableness, AVG(P.emotional_stability) AS Emotional_stability, 
                                    AVG(P.conscientiousness) AS Conscientiousness, AVG(P.extraversion) AS Extraversion FROM personalities P
                                    JOIN p_ratings R ON P.userId = R.userId
                                    WHERE P.userId IN (SELECT R.userId FROM p_ratings R JOIN genres G ON R.movieId = G.movieId 
                                    WHERE R.rating > 4 AND G.genre = '$genre' AND G.movieId IN (SELECT movieId FROM genres GROUP BY movieId HAVING COUNT(movieId) = 1))";
                                    $result = mysqli_query($connection,$sql);
                                    $row = mysqli_fetch_array($result);
                                    if(!$result){
                                        die('Cannot read data!'.mysqli_error($connection));
                                    }
                                    
                                    echo "<tr><th>Openness</th><td>${row['Openness']}</td><tr><th>Agreeableness</th><td>${row['Agreeableness']}</td><tr><th>Emotional_stability</th><td>${row['Emotional_stability']}</td><tr><th>Conscientiousness</th><td>${row['Conscientiousness']}</td><tr><th>Extraversion</th><td>${row['Extraversion']}</td></tr>";
                                }
                                //multiple genres
                                else{
                                    $con = implode(",", array_map("format", $genre_list));
                                    $sql = "SELECT AVG(P.openness) AS Openness, AVG(P.agreeableness) AS Agreeableness, AVG(P.emotional_stability) AS Emotional_stability, 
                                    AVG(P.conscientiousness) AS Conscientiousness, AVG(P.extraversion) AS Extraversion FROM personalities P
                                    JOIN p_ratings R ON P.userId = R.userId
                                    WHERE P.userId IN (SELECT R.userId FROM p_ratings R JOIN genres G ON R.movieId = G.movieId 
                                    WHERE R.rating > 4 AND G.movieId IN (SELECT movieId FROM genres WHERE genre IN ($con) GROUP BY movieId HAVING COUNT(movieId) = $length))";
                                    $result = mysqli_query($connection,$sql);
                                    $row = mysqli_fetch_array($result);
                                    if(!$result){
                                        die('Cannot read data!'.mysqli_error($connection));
                                    }
                                    echo "<tr><th>Openness</th><td>${row['Openness']}</td><tr><th>Agreeableness</th><td>${row['Agreeableness']}</td><tr><th>Emotional_stability</th><td>${row['Emotional_stability']}</td><tr><th>Conscientiousness</th><td>${row['Conscientiousness']}</td><tr><th>Extraversion</th><td>${row['Extraversion']}</td></tr>";
                                }
                                mysqli_close($connection);
                                ?>
                            </tbody>
                        </table>
                        </a>
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/186b8010d1.js" crossorigin="anonymous"></script>
    <script>
        function reset(){
            var inputs = document.querySelectorAll('filter_ctags');
            console.log(inputs); 
        for (var i = 0; i < inputs.length; i++) { 
            inputs[i].checked = false; 
        }
        }
        
    </script>
</body>

</html>

