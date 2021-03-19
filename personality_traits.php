<!DOCTYPE html>
<html>
  <head>
    <title>Personality_traits page</title>
  </head>
  <body>
	  <h1>Personality</h1><br/>
	<form action="personality_traits.php" method="post">
		<input type="text" name="genre" placeholder="Input genres seperated by comma">
		<input type="submit" value="Submit">
	</form>
  </body>
</html>

<?php
$connection = mysqli_connect('127.0.0.1','root','','Movie_Database');
if(!$connection){
    die("Fail to connect: " . mysqli_connect_error());
}

$genre = $_POST['genre'];
$genre_list = explode(',',$genre);
$length = count($genre_list);

function format($condition){
    return("'" . $condition . "'");
}

if($length == 1){
    $sql = "SELECT AVG(P.openness) AS Openness, AVG(P.agreeableness) AS Agreeableness, AVG(P.emotional_stability) AS Emotional_stability, 
    AVG(P.conscientiousness) AS Conscientiousness, AVG(P.extraversion) AS Extraversion FROM personalities P
    JOIN p_ratings R ON P.userId = R.userId
    WHERE P.userId IN (SELECT R.userId FROM p_ratings R JOIN genres G ON R.movieId = G.movieId 
    WHERE R.rating > 4 AND G.genre = '$genre' AND G.movieId IN (SELECT movieId FROM genres GROUP BY movieId HAVING COUNT(movieId) = 1))";

    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result);
    if(!$result){
        die('Cannot read data!'.mysqli_error($connection));
    }
    echo "<p>Openness: ${row['Openness']},Agreeableness: ${row['Agreeableness']},Emotional_stability: ${row['Emotional_stability']},Conscientiousness: ${row['Conscientiousness']},Extraversion: ${row['Extraversion']},\n</p>";
}
//multiple genres
else{
    $con = implode(",", array_map("format", $genre_list));
    $sql = "SELECT AVG(P.openness) AS Openness, AVG(P.agreeableness) AS Agreeableness, AVG(P.emotional_stability) AS Emotional_stability, 
    AVG(P.conscientiousness) AS Conscientiousness, AVG(P.extraversion) AS Extraversion FROM personalities P
    JOIN p_ratings R ON P.userId = R.userId
    WHERE P.userId IN (SELECT R.userId FROM p_ratings R JOIN genres G ON R.movieId = G.movieId 
    WHERE R.rating > 4 AND G.movieId IN (SELECT movieId FROM genres WHERE genre IN ($con) GROUP BY movieId HAVING COUNT(movieId) = $length))";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result);
    if(!$result){
        die('Cannot read data!'.mysqli_error($connection));
    }
    echo "<p>Openness: ${row['Openness']},Agreeableness: ${row['Agreeableness']},Emotional_stability: ${row['Emotional_stability']},Conscientiousness: ${row['Conscientiousness']},Extraversion: ${row['Extraversion']},\n</p>";
}

mysqli_close($connection);
?>