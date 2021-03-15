<html>

  <?php
    $connection = mysqli_connect('localhost', 'root', 'newroot12', 'newDB');
    $query = "SELECT genres FROM genres WHERE movieId = '2'";
    $result = mysqli_query($connection, $query)
  	 ?>

  <head>
  	 <title>Example Document</title>
  </head>
  <body>
  	<h1>Popular Movies</h1>
  	
  	<?php 
  
  	$query = "SELECT movies_info.title AS NEWT, RT.AVERAGE AS NEWA, RT.CT AS NEWC FROM (SELECT movieId AS ID, AVG(rating) AS AVERAGE, COUNT(movieId) AS CT from ratings GROUP BY movieId) as RT INNER JOIN movies_info ON RT.ID = movies_info.movieId WHERE RT.AVERAGE > 3.5 AND RT.CT > 50 ORDER BY RT.CT DESC, RT.AVERAGE DESC";



    $result = mysqli_query($connection,$query)
    or die('Error making select users query' . mysql_error());
    //echo '<table border="1">';
    while ($row = mysqli_fetch_array($result))
    {
      echo "<p>Title = ${row['NEWT']}, rating = ${row['NEWA']}, rating_number = ${row['NEWC']}\n</p>";


      
    }
    //echo '</table>';

    mysqli_close($connection);

  	?>
  	
 
  </body>
</html