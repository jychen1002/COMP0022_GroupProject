<!DOCTYPE html>
<html>
  <head>
    <title>Search page</title>
  </head>
  <body>
	  <h1>Search</h1><br/>
	
  </body>
</html>
<?php
    $connection = mysqli_connect('127.0.0.1','root','','Movie_Database');
    $keywords=$_POST['keywords'];
    $option = $_POST['select_option'];
    if(strcmp($option, "1")==0){
        $sql="SELECT*FROM movies_info WHERE title like '%".$keywords."%' ORDER BY year";
        $result=mysqli_query($connection,$sql);
        if(!$result){
            die('Cannot read data!'.mysqli_error($connection));
        }
        echo "<h2>Research Result</h2>";
        echo "<table border='1'><tr><td><b>Year</b></td><td><b>Movie Name</b></td></tr>";
        while($row=mysqli_fetch_array($result)){
            echo '<tr><td>' . $row['year']. '</td><td>' .
            $row['title']. '</tr></td>'  ;      
        }
        echo '</table>';
    }
     
    if(strcmp($option, "2")==0){
        $sql="SELECT*FROM genres,movies_info WHERE genre like '%".$keywords."%' AND genres.movieId = movies_info.movieId ORDER BY year";
        $result=mysqli_query($connection,$sql);
        if(!$result){
            die('Cannot read data!'.mysqli_error($connection));
        }
        echo "<h2>Search Result</h2>";
        echo "<table border='1'><tr><td><b>Genre</b></td><td><b>Year</b></td><td><b>Movie Name</b></td></tr>";
        while($row=mysqli_fetch_array($result)){
            echo '<tr><td>' . $row['genre']. '</td><td>' . $row['year'].'</td><td>' .
            $row['title']. '</tr></td>'  ;  
        }
        echo '</table>';
    }
    mysqli_close($connection);

    if(strcmp($option, "3")==0){
        $sql="SELECT*FROM tags,movies_info WHERE tag like '%".$keywords."%' AND tags.movieId = movies_info.movieId ORDER BY tag";
        $result=mysqli_query($connection,$sql);
        if(!$result){
            die('Cannot read data!'.mysqli_error($connection));
        }
        echo "<h2>Search Result</h2>";
        echo "<table border='1'><tr><td><b>Tag</b></td><td><b>Year</b></td><td><b>Movie Name</b></td></tr>";
        while($row=mysqli_fetch_array($result)){
            echo '<tr><td>' . $row['tag']. '</td><td>' .$row['year'].'</td><td>' .
            $row['title']. '</tr></td>'  ;  
        }
        echo '</table>';
    }

?>