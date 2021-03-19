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
  	<h1>Most polarising</h1>
  	
  	<?php 
  
  	$query = "SELECT movies_info.movieId as ID, movies_info.title AS TITLE, movies_info.year AS YEAR, RT.AVG AS AVER, RT.COUNT AS CT FROM (SELECT movieId, VARIANCE(rating) AS VARIANCE, AVG(rating) AS AVG, COUNT(rating) AS COUNT FROM ratings GROUP BY movieId ORDER BY VARIANCE) as RT INNER JOIN movies_info ON RT.movieId = movies_info.movieId WHERE RT.COUNT > 30 AND RT.VARIANCE >= 0.8 ORDER BY RT.VARIANCE DESC, RT.COUNT DESC";

    //SELECT movieId, VARIANCE(rating) FROM ratings GROUP BY movieId ORDER BY VARIANCE(rating) DESC



    $result = mysqli_query($connection,$query)
    or die('Error making select users query' . mysql_error());
    //echo '<table border="1">';
    while ($row = mysqli_fetch_array($result))
    {
      echo "<p>ID = ${row['ID']}, Title = ${row['TITLE']}, year = ${row['YEAR']}, average_rating = ${row['AVER']}, ${row['CT']},\n</p>";


      
    }
    //echo '</table>';

    mysqli_close($connection);

  	?>
  	
 
  </body>
</html