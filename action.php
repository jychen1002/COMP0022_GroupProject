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
  	<h1>Action Movies</h1>
  	
  	<?php 
  
  	$query = "SELECT title AS T, year AS Y from movies_info where movieId in (SELECT movieId FROM genres WHERE genre = 'Action')";



    $result = mysqli_query($connection,$query)
    or die('Error making select users query' . mysql_error());
    //echo '<table border="1">';
    while ($row = mysqli_fetch_array($result))
    {
      echo "<p>Title = ${row['T']}, Year =  ${row['Y']}\n</p>";


      
    }
    //echo '</table>';

    mysqli_close($connection);

  	?>
  	
 
  </body>
</html