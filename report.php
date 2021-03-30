<?php
  $connection = mysqli_connect('127.0.0.1','admin','[password]','newDB');
  $id = $_GET['movieId'];
  $sql="SELECT*FROM movies_info WHERE movieId = $id";
  $result=mysqli_query($connection,$sql);
  if(!$result){
      die('Cannot read data!'.mysqli_error($connection));
  }
  $row=mysqli_fetch_array($result);
  $image = $row['imglink'];
  $title = $row['title'];
  $year = $row['year'];

  $query="SELECT*FROM ratings WHERE movieId = $id";
  $ratings=mysqli_query($connection,$query);
  $sum = 0;
  $count = 0;
  if(!$ratings){
      die('Cannot read data!'.mysqli_error($connection));
  }
  while($row=mysqli_fetch_array($ratings)){
      $sum = $sum + $row['rating'];
      $count = $count +1;
  }
  $average = $sum / $count;
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Directing Template">
    <meta name="keywords" content="Directing, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Report</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap" rel="stylesheet">

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
        </div>
        <!--Section: Block Content-->
<section class="mb-5">

    <div class="row">
      <div>
        <div>
          <div class="col-12 mb-0">
            <figure style="text-align: center">
            <?php
              echo'<img src= '.$image.' width="150%" height="150%">';
            ?>
            </figure>         
          </div>
        </div>
  
      </div>
      <div class="col-md-6">
          <div>
            <?php
              echo'<h2 style="font-weight:900;">'.$title.'</h2>';
              if($count == 0){
                echo"Not enough viewers to rate";
              }else{
                echo'<h2 class=rating >Average Rating: '.$average.'('.$count.')</h2>';
              }
            ?>
          </div>
        <div class="table-responsive">
          <table class="table table-sm table-borderless mb-0">
            <tbody>
                <?php
                  echo'<tr><th class="pl-0 w-25" scope="row"><strong>Year :</strong></th>
                  <td>'.$year.'</td></tr>';
                  echo'<tr><th class="pl-0 w-25" scope="row"><strong>Genres :</strong></th>';

                  $query="SELECT*FROM genres WHERE movieId = $id";
                  $genres=mysqli_query($connection,$query);
                  if(!$genres){
                      die('Cannot read data!'.mysqli_error($connection));
                  }
                  while($row_genre = mysqli_fetch_array($genres)){
                    echo"<td>".$row_genre['genre']."</td>";
                  }
                  echo'</tr>';
                  mysqli_free_result($genres);
                ?>
            </tbody>
          </table>
        <hr>
        <h4 style="padding-bottom:30px">
            Tags
        </h4>
        <?php
          $query="SELECT COUNT(tag) AS TAGCOUNT, tag from tags WHERE movieId = $id GROUP BY tag";
          $tags=mysqli_query($connection,$query);
          if(!$tags){
              die('Cannot read data!'.mysqli_error($connection));
          }

          while($row=mysqli_fetch_array($tags)){
              echo '<span class="badge badge-pill badge-primary"  style="margin-right:20px; margin-bottom:20px;">'.$row['tag'].' ('.$row['TAGCOUNT'].')'.'</span>'; 
          }
        ?>
        <hr>
        <h4 style="padding-bottom:30px">
            Rating Distribution
        </h4>
        <?php
        echo '<table class="table">
        <thead>
          <tr>
            <th scope="col">Score</th>
            <th scope="col">Count</th>
          </tr>
        </thead>
        <tbody>';
        $sql = "SELECT COUNT(rating) AS RTCOUNT, 5.0 AS SCORE from ratings WHERE movieId = $id AND rating = 5.0;";
        $sql .= "SELECT COUNT(rating) AS RTCOUNT, 4.5 AS SCORE from ratings WHERE movieId = $id AND rating = 4.5;";
        $sql .= "SELECT COUNT(rating) AS RTCOUNT, 4.0 AS SCORE from ratings WHERE movieId = $id AND rating = 4.0;";
        $sql .= "SELECT COUNT(rating) AS RTCOUNT, 3.5 AS SCORE from ratings WHERE movieId = $id AND rating = 3.5;";
        $sql .= "SELECT COUNT(rating) AS RTCOUNT, 3.0 AS SCORE from ratings WHERE movieId = $id AND rating = 3.0;";
        $sql .= "SELECT COUNT(rating) AS RTCOUNT, 2.5 AS SCORE from ratings WHERE movieId = $id AND rating = 2.5;";
        $sql .= "SELECT COUNT(rating) AS RTCOUNT, 2.0 AS SCORE from ratings WHERE movieId = $id AND rating = 2.0;";
        $sql .= "SELECT COUNT(rating) AS RTCOUNT, 1.5 AS SCORE from ratings WHERE movieId = $id AND rating = 1.5;";
        $sql .= "SELECT COUNT(rating) AS RTCOUNT, 1.0 AS SCORE from ratings WHERE movieId = $id AND rating = 1.0;";
    
        $sql.= "SELECT COUNT(rating) AS RTCOUNT, 0.5 AS SCORE, FROM ratings WHERE movieId = $id AND rating = 0.5;";
    
        if (mysqli_multi_query($connection, $sql)) {
          do {
        // Store first result set
            if ($result = mysqli_store_result($connection)) {
               
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                <td>'.$row['SCORE'].'</td>
                <td> '.$row['RTCOUNT'].'</td>
                </tr>';
              }
              mysqli_free_result($result);
            }
        // if there are more result-sets, the print a divider
            if (mysqli_more_results($connection)) {
                //printf("-----------------");
                
            }
                 //Prepare next result set
          } while (mysqli_next_result($connection));
          }
        echo'</tbody>
        </table>';     
        ?>
        <?php
         
          $query="SELECT ((SELECT COUNT(*) FROM ratings WHERE rating > 3 AND movieId = $id )/ COUNT(*) ) * 100 AS 'Percentage' FROM ratings WHERE movieId = $id";

          $percent=mysqli_query($connection,$query);
          if(!$percent){
              die('Cannot read data!'.mysqli_error($connection));
          }
          while($row=mysqli_fetch_array($percent)){
               echo "<h4> Percentage of users who like this film = ${row['Percentage']} % </h4></br>";
          }
          
      
      
          $query="SELECT genre, COUNT(*) from genres where movieId in (SELECT movieId From ratings WHERE userId In (SELECT userId FROM ratings WHERE rating >= 4 AND movieId = $id) AND rating >= 4) GROUP BY genre ORDER BY COUNT(*) DESC LIMIT 3";
      
          $genre=mysqli_query($connection,$query);
          if(!$genre){
              die('Cannot read data!'.mysqli_error($connection));
          }
          echo "<h4> Viewers who like this film also like these genres:  </h4>";
      
          echo'
          <table class="table table-sm table-borderless mb-0">
            <tbody><tr>';
          while($row=mysqli_fetch_array($genre)){
               echo "<td> ${row['genre']} </td>";
          }
          echo'</tr></tbody></table></br>';
          
      
          $query="SELECT tag, COUNT(*) AS CT from tags where movieId in (SELECT movieId From ratings WHERE userId In (SELECT userId FROM ratings WHERE rating >= 4 AND movieId = $id) AND rating >= 4) GROUP BY tag ORDER BY COUNT(*) DESC LIMIT 3";
      
          $tags=mysqli_query($connection,$query);
          if(!$tags){
              die('Cannot read data!'.mysqli_error($connection));
          }
      
          echo "<h4> Viewers who like this film also like films with these tags: </h4>";
          
          echo'
          <table class="table table-sm table-borderless mb-0">
            <tbody><tr>';
          while($row=mysqli_fetch_array($tags)){
              echo " <td>${row['tag']} [${row['CT']}] </td>" ;  
          }
          echo'</tr></tbody></table></br>';
      
          $query="SELECT Info.movieId, Info.title, Info.year FROM movies_info AS Info INNER JOIN (SELECT movieId, rating From ratings WHERE userId In (SELECT userId FROM ratings WHERE rating >= 4 AND movieId = $id) AND rating >= 4 ORDER BY rating DESC LIMIT 4) AS Tops on Tops.movieId = Info.movieId WHERE Info.movieId != $id";
      
          $movie=mysqli_query($connection,$query);
          if(!$movie){
              die('Cannot read data!'.mysqli_error($connection));
          }
          echo "<h4> Viewers who like this film also like these films: </h4>";
          echo'
          <table class="table table-sm table-borderless mb-0">
            <tbody><tr>';
          while($row=mysqli_fetch_array($movie)){
      
               echo "<td> ${row['title']} (${row['year']})</td>";
          }
          echo'</tr></tbody></table></br>';
        ?>
      </div>
    </div>
  
  </section>
  <!--Section: Block Content-->
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
      </script>

</body>

</html>