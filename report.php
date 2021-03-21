<?php
  $connection = mysqli_connect('127.0.0.1','root','12345678','Movie_Database');
  $name = $_GET['movie_name'];
?>
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
              <img src="./img/1.jpg" width="55%" height="55%">
            </figure>         
          </div>
        </div>
  
      </div>
      <div class="col-md-6">
          <div >
            <?php
              echo'<h2 style="font-weight:900;">'.$name.'</h2>'
            ?>
            <h2 class=rating >9.3</h2>
              </div>
        <p class="pt-1">Framed in the 1940s for the double murder of his wife and her lover, upstanding banker Andy Dufresne begins a new life at the Shawshank prison, where he puts his accounting skills to work for an amoral warden. During his long stretch in prison, Dufresne comes to be admired by the other inmates -- including an older prisoner named Red -- for his integrity and unquenchable sense of hope.</p>
        <div class="table-responsive">
          <table class="table table-sm table-borderless mb-0">
            <tbody>
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Genres:</strong></th>
                <td>test</td>
              </tr>
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Dierctors:</strong></th>
                <td>test</td>
              </tr>
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Actors:</strong></th>
                <td>test</td>
              </tr>
            </tbody>
          </table>
        <hr>
        <h4 style="padding-bottom:30px">
            Tags
        </h4>
        <span class="badge badge-pill badge-primary">Primary</span>
        <span class="badge badge-pill badge-secondary">Secondary</span>
        <span class="badge badge-pill badge-success">Success</span>
        <hr>
        <h4 style="padding-bottom:30px">
            Viewers who might like this movie:
        </h4>
        <table class="table table-sm table-borderless mb-0">
          <tbody>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Openness:</strong></th>
              <td>test</td>
            </tr>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Agreeableness:</strong></th>
              <td>test</td>
            </tr>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Emotional_stability:</strong></th>
              <td>test</td>
            </tr>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Conscientiousness:</strong></th>
              <td>test</td>
            </tr>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Extraversion:</strong></th>
              <td>test</td>
            </tr>
          </tbody>
        </table>
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