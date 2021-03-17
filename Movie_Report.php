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
    $connection = mysqli_connect('127.0.0.1','root','Amy2000718!','Movie_Database');
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

    $query="SELECT*FROM genres WHERE movieId = $id";
    $tags=mysqli_query($connection,$query);
    if(!$tags){
        die('Cannot read data!'.mysqli_error($connection));
    }
    echo "Genre: ";
    while($row=mysqli_fetch_array($tags)){
        echo $row['genre']. ', '  ;  
    }

    $query="SELECT*FROM tags WHERE movieId = $id";
    $tags=mysqli_query($connection,$query);
    if(!$tags){
        die('Cannot read data!'.mysqli_error($connection));
    }
    echo "<table border='1'><tr><td><b>Tags</b></td></tr>";
    while($row=mysqli_fetch_array($tags)){
        echo '<tr><td>' . $row['tag']. '</tr></td>'  ;  
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
    mysqli_close($connection);
   
?>
    
