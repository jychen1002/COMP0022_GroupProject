<!DOCTYPE html>
<html>
  <head>
    <title>Prediction page</title>
  </head>
  <body>
	  <h1>Predict</h1><br/>
	<form action="predicting_rating.php" method="post">
    <input type="text" name="tag" placeholder="Input tags seperated by comma">
		<input type="text" name="genre" placeholder="Input genres seperated by comma">
		<input type="submit" value="Submit">
	</form>
  </body>
</html>

<?php
$connection = mysqli_connect('127.0.0.1','root','newroot12','newDB');
if(!$connection){
    die("Fail to connect: " . mysqli_connect_error());
}
$tag = $_POST['tag'];
$tag_list = explode(',',$tag);
$genre = $_POST['genre'];
$genre_list = explode(',',$genre);
$length = count($genre_list);

function format($condition){
    return("'" . $condition . "'");
}
$temp = implode(",", array_map("format", $tag_list));
$tag_sql = "SELECT AVG(R.rating) AS AverageScore FROM ratings R
    JOIN tags T ON R.movieId = T.movieId
    WHERE T.tag IN ($temp)";
$res = mysqli_query($connection,$tag_sql);
$row = mysqli_fetch_array($res);
if(!$res){
    die('Cannot read data!'.mysqli_error($connection));
}
echo "<p>mean score by tag: ${row['AverageScore']}\n</p>";
//average rating of movie with single genre
if($length == 1){
    $sql = "SELECT AVG(R.rating) AS AverageScore FROM ratings R 
    JOIN genres G 
    ON R.movieId = G.movieId
    WHERE G.genre = '$genre' AND G.movieId IN (SELECT movieId FROM genres GROUP BY movieId HAVING COUNT(movieId) = 1)";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result);
    if(!$result){
        die('Cannot read data!'.mysqli_error($connection));
    }
    echo "<p>mean score: ${row['AverageScore']}\n</p>";
}
//multiple genres
else{
    $con = implode(",", array_map("format", $genre_list));
    $sql = "SELECT AVG(R.rating) AS AverageScore FROM ratings R 
    JOIN genres G 
    ON R.movieId = G.movieId
    WHERE G.movieId IN (SELECT movieId FROM genres WHERE genre IN ($con) GROUP BY movieId HAVING COUNT(movieId) = $length)";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result);
    if(!$result){
        die('Cannot read data!'.mysqli_error($connection));
    }
    echo "<p>mean score: ${row['AverageScore']}\n</p>";
}
/* median
$sql = "SELECT R1.rating FROM ratings R1, ratings R2 
JOIN genres G 
ON R1.movieId = G.movieId
WHERE R1.movieId = R2.movieId AND G.genre = 'Adventure' AND R1.movieId IN (SELECT movieId FROM genres GROUP BY movieId HAVING COUNT(movieId) = 1)
GROUP BY R1.rating
HAVING SUM(R1.rating = R2.rating) >= ABS(SUM(SIGN(R1.rating-R2.rating)))";

$sql = "SELECT R1.rating FROM ratings R1
JOIN ratings R2 
ON R1.movieId = R2.movieId
JOIN genres G 
ON R1.movieId = G.movieId
WHERE G.genre = 'Drama' AND R1.movieId IN (SELECT movieId FROM genres GROUP BY movieId HAVING COUNT(movieId) = 1)
GROUP BY R1.rating 
HAVING SUM(R1.rating = R2.rating) >= ABS(SUM(SIGN(R1.rating-R2.rating)))";
*/
//mode
/*$mode = "SELECT R.rating, COUNT(R.rating) AS num FROM ratings R
JOIN genres G 
ON R.movieId = G.movieId
WHERE G.genre = '$genre' AND R.movieId IN (SELECT movieId FROM genres GROUP BY movieId HAVING COUNT(movieId) = 1)
GROUP BY R.rating
ORDER BY num DESC
LIMIT 1";
$mode = "SELECT R.rating, COUNT(R.rating) AS num FROM ratings R
JOIN genres G 
ON R.movieId = G.movieId
WHERE G.genre IN ($con) AND R.movieId IN (SELECT movieId FROM genres GROUP BY movieId HAVING COUNT(movieId) = $length)
GROUP BY R.rating
ORDER BY num DESC
LIMIT 1";
*/
mysqli_close($connection);
?>