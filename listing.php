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

<body class="ov-hid">
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
<<<<<<< HEAD
                                <li><form class=" navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search movies,tags,and genres..."
                                            aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form></li>
                                <li><a href="./listing.html">LISTING</a>
                                <li><a href=#>RANKING</a>
                                    <ul class="dropdown">
                                        <li><a href="./popular.html">THE MOST POPULAR FILMS</a></li>
=======
                            <li><a href="./index.php">SEARCHING</a>
                                <li><a href="./ShowMovieList.php">LISTING</a>
                                <li><a href=#>RANKING</a>
                                    <ul class="dropdown">
                                        <li><a href="./popular.php">THE MOST POPULAR FILMS</a></li>
                                        <li><a href="./polarising.php">THE MOST POLARISING FILMS</a></li>
>>>>>>> dda33eaa9bf82afb8c1542f01486c0bd8924a28e
                                    </ul>
                            </ul>
                        </nav>
                        <div class="header__menu__right">
                            <a href="signin.php" class="login-btn"><i class="fa fa-user"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Filter Begin -->
    <div class="filter nice-scroll">
        <div class="filter__title">
            <h5><i class="fa fa-filter"></i> Filter</h5>
        </div>
        <hr class="sidebar-divider">
        <div class="filter__tags" id="filter_tags">
            <h6>Tag</h6>
            <label for="Action">
                Action
                <input type="checkbox" id="filter__tags" >
                <span class="checkmark"></span>
            </label>
            <label for="Adventure">
                Adventure
                <input type="checkbox" id="Adventure" >
                <span class="checkmark"></span>
            </label>
            <label for="Animation">
                Animation
                <input type="checkbox" id="Animation">
                <span class="checkmark"></span>
            </label>
            <label for="Children">
                Children
                <input type="checkbox" id="Children">
                <span class="checkmark"></span>
            </label>
            <label for="Comedy">
                Comedy
                <input type="checkbox" id="Comedy">
                <span class="checkmark"></span>
            </label>
            <label for="Fantasy">
                Fantasy
                <input type="checkbox" id="Fantasy">
                <span class="checkmark"></span>
            </label>
            <label for="Romance">
                Romance
                <input type="checkbox" id="Romance">
                <span class="checkmark"></span>
            </label>
            <label for="Drama">
                Drama
                <input type="checkbox" id="Drama">
                <span class="checkmark"></span>
            </label>
            <label for="Crime">
                Crime
                <input type="checkbox" id="Crime">
                <span class="checkmark"></span>
            </label>
            <label for="Thriller">
                Thriller
                <input type="checkbox" id="Thriller">
                <span class="checkmark"></span>
            </label>
            <label for="Horror">
                Horror
                <input type="checkbox" id="Horror">
                <span class="checkmark"></span>
            </label>
            <label for="Mystery">
                Mystery
                <input type="checkbox" id="Mystery">
                <span class="checkmark"></span>
            </label>
            <label for="Sci-Fi">
                Sci-Fi
                <input type="checkbox" id="Sci-Fi">
                <span class="checkmark"></span>
            </label>
            <label for="War">
                War
                <input type="checkbox" id="War">
                <span class="checkmark"></span>
            </label>
            <label for="Musical">
                Musical
                <input type="checkbox" id="Musical">
                <span class="checkmark"></span>
            </label>
            <label for="Documentary">
                Documentary
                <input type="checkbox" id="Documentary">
                <span class="checkmark"></span>
            </label>
            <label for="IMAX">
                IMAX
                <input type="checkbox" id="IMAX">
                <span class="checkmark"></span>
            </label>
            <label for="Western">
                Western
                <input type="checkbox" id="Western">
                <span class="checkmark"></span>
            </label>
            <label for="Film-Noir">
                Film-Noir
                <input type="checkbox" id="Film-Noir">
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="filter__btns">
            <button type="submit">Filter Results</button>
            <button class="filter__reset" onclick="reset()" value = "Reset form">Reset All</button>
        </div>
    </div>
    <!-- Filter End -->

    <!-- Listing Section Begin -->
    <?php
        $connection = mysqli_connect('127.0.0.1','root','Liao1531639504_','newDB');
        $keywords=$_POST['keywords'];                
        $option = $_POST['select_option'];
    ?>
    <section class="listing nice-scroll">
        <div id = "1">
            <div class="listing__text__top">
                <div class="listing__text__top__left">
                    <h5>Results</h5>
                    <?php
                        if(strcmp($option, "1")==0){
                            $sql="SELECT COUNT(movieId) AS CT FROM movies_info WHERE title like '%".$keywords."%'";
                            $result=mysqli_query($connection,$sql);
                            $row=mysqli_fetch_array($result);
                            echo "<span>".$row['CT']." Movies Found</span>";
                        }

                        if(strcmp($option, "2")==0){
                            $sql="SELECT COUNT(movies_info.movieId) AS CT FROM genres,movies_info WHERE genre like '%".$keywords."%' AND genres.movieId = movies_info.movieId";
                            $result=mysqli_query($connection,$sql);
                            $row=mysqli_fetch_array($result);
                            echo "<span>".$row['CT']." Movies Found</span>";
                        }

                        if(strcmp($option, "3")==0){
                            $sql="SELECT COUNT(movies_info.movieId) AS CT FROM tags,movies_info WHERE tag like '%".$keywords."%' AND tags.movieId = movies_info.movieId";
                            $result=mysqli_query($connection,$sql);
                            $row=mysqli_fetch_array($result);
                            echo "<span>".$row['CT']." Movies Found</span>";
                        }
                    ?>
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
                if(strcmp($option, "1")==0){
                    $sql="SELECT*FROM movies_info WHERE title like '%".$keywords."%' ORDER BY year";
                    $result=mysqli_query($connection,$sql);
                    if(!$result){
                        die('Cannot read data!'.mysqli_error($connection));
                    }
                    while($row=mysqli_fetch_array($result)){
                        echo '<div class="listing__item">
                                <div class="listing__item__pic set-bg" data-setbg="img/listing/list-1.jpg">
                                </div>
                                <div class="listing__item__text">
                                    <div class="listing__item__text__inside">
                                        <h5>'.$row['title'].'</h5>
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
                }
                
                if(strcmp($option, "2")==0){
                    $sql="SELECT*FROM genres,movies_info WHERE genre like '%".$keywords."%' AND genres.movieId = movies_info.movieId ORDER BY year";
                    $result=mysqli_query($connection,$sql);
                    if(!$result){
                        die('Cannot read data!'.mysqli_error($connection));
                    }
                    while($row=mysqli_fetch_array($result)){
                        echo '<div class="listing__item">
                                <div class="listing__item__pic set-bg" data-setbg="img/listing/list-1.jpg">
                                </div>
                                <div class="listing__item__text">
                                    <div class="listing__item__text__inside">
                                        <h5>'.$row['title'].'</h5>
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
                }
                

                if(strcmp($option, "3")==0){
                    $sql="SELECT*FROM tags,movies_info WHERE tag like '%".$keywords."%' AND tags.movieId = movies_info.movieId ORDER BY year";
                    $result=mysqli_query($connection,$sql);
                    if(!$result){
                        die('Cannot read data!'.mysqli_error($connection));
                    }
                    while($row=mysqli_fetch_array($result)){
                        echo '<div class="listing__item">
                                <div class="listing__item__pic set-bg" data-setbg="img/listing/list-1.jpg">
                                </div>
                                <div class="listing__item__text">
                                    <div class="listing__item__text__inside">
                                        <h5>'.$row['title'].'</h5>
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
                }

                mysqli_close($connection);
                
            ?>
            </div>
        </div>
    <div id = "2" style="display:none" >
        <div class="listing__text__top">
            <div class="listing__text__top__left">
                <h5>Results</h5>
                <span>18 Movies Found</span>
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
                                <th scope="col">Poster</th>
                                <th scope="col">Movie Name</th>
                                <th scope="col">Directors</th>
                                <th scope="col">Actors</th>
                                <th scope="col">Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td></td>
                                <td> The Shawshank Redemption</td>
                                <td>Frank Darabont</td>
                                <td> Stephen King </td>
                                <td>9.2</td>
                            </tr>
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
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