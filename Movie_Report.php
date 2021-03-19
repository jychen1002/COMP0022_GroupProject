<!DOCTYPE html>
<html>
  <head>
    <title>Search page</title>
  </head>
  <body>
	  <h1>Search</h1><br/>
	<form action="Movie_Report.php" method="post">
		<input type="text" name="keywords" placeholder="Input any content you want to search">
		<input type="submit" value="Submit">
	</form>
  </body>
</html>
<?php
    $connection = mysqli_connect('127.0.0.1','root','','Movie_Database');
    $keywords=$_POST['keywords'];
    $sql="SELECT*FROM movies_info WHERE title like '%".$keywords."%'";
    $result=mysqli_query($connection,$sql);
    if(!$result){
        die('Cannot read data!'.mysqli_error($connection));
    }
    $row=mysqli_fetch_array($result);
    $title = $row['title'];
    $id = $row['movieId'];
    echo '<h2>'.$title.'</h2>';
    echo '<b>Year</b>: '.$row['year'].'</h2><br/>';

    $query="SELECT*FROM genres WHERE movieId = $id";
    $tags=mysqli_query($connection,$query);
    if(!$tags){
        die('Cannot read data!'.mysqli_error($connection));
    }
    echo '<b>Genre</b>: ';
    while($row=mysqli_fetch_array($tags)){
        echo $row['genre']. ', '  ;  
    }

    $query="SELECT COUNT(tag) AS TAGCOUNT, tag from tags WHERE movieId = $id GROUP BY tag";

    $tags=mysqli_query($connection,$query);
    if(!$tags){
        die('Cannot read data!'.mysqli_error($connection));
    }
    echo "<table border='1'><tr><td><b>Tags</b></td></tr>";
    while($row=mysqli_fetch_array($tags)){
        echo '<tr><td>' . "${row['tag']} (${row['TAGCOUNT']})". '</tr></td>'  ;  
    }
    echo '</table>';

    $query="SELECT*FROM ratings WHERE movieId = $id";
    $ratings=mysqli_query($connection,$query);
    $sum = 0;
    $count = 0;
    if(!$ratings){
        die('Cannot read data!'.mysqli_error($connection));
    }
    echo "<table border='1'><tr><td><b>Rating Count</b></td><td><b>Average Rating</b></td></tr>";
    while($row=mysqli_fetch_array($ratings)){
        $sum = $sum + $row['rating'];
        $count = $count +1;
    }
    $average = $sum / $count;
    echo "<tr><td>".$count."</td><td>".$average."</tr></td>";
    echo '</table>';


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
            //echo "<p> title = ${row['title']},  </p>"; 
            echo "<p> count = ${row['RTCOUNT']}  score = ${row['SCORE']}</p>";
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






    mysqli_close($connection);
   
?>
    
