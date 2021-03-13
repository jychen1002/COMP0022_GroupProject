<?php
  $connection = mysqli_connect('127.0.0.1','root','密码自己改一下','Movie_Database');
  $query = "SELECT title FROM movie_name";
  $result = mysqli_query($connection,$query)
   or die('Error making select users query' . mysql_error());
  echo '<table border="1">';
    while ($row = mysqli_fetch_array($result))
    {
      echo '<tr><td>' . $row['MovieID']. '</td><td>' .
      $row['title']. '</tr></td>';      
    }
    echo '</table>';

    mysqli_close($connection);
?>