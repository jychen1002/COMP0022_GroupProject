<html>  

<head>
	<title>Test API</title>
	</head>
	<body>



<?php

$connection = mysqli_connect('localhost', 'root', '', 'Movie_Database');
$id = 4;
$query = "SELECT imdbId FROM links WHERE movieId = $id";

$imdb_Id = mysqli_query($connection, $query)
or die('Error making select users query' . mysql_error());

while ($row = mysqli_fetch_array($imdb_Id))
    {
    	//echo "${row['imdbId']}";
    	$a = $row['imdbId'];
      
    }

$row = mysqli_fetch_array($imdb_Id);
mysqli_close($connection);


$json = file_get_contents("https://api.themoviedb.org/3/movie/".$a."?api_key=3e1407d3d68eae15922bf26a5b31827c");

$result = json_decode($json, true);

$poster_path = $result["poster_path"];

echo "<img src=\"https://image.tmdb.org/t/p/w300$poster_path\">";


$apikey = "3e1407d3d68eae15922bf26a5b31827c";

$json = file_get_contents("https://api.themoviedb.org/3/movie/".$a."?api_key=$apikey");

$result = json_decode($json, true);


echo "<p>${result["overview"]} </p>";





?>

</body>

</html>