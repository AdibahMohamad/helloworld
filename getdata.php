<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "babysitter";

//creating a new connection object using mysqli
$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
	die("Connection failed: " .$conn->connect_error);
}

$nursery = array();

$sql = "SELECT n_name,description,rating,categorie,location,img FROM nursery";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($n_name, $description, $rating, $categorie, $location, $img);
	//, $description, $rating, $categorie, $location, $img);

while($stmt->fetch()){
	$temp = [
	//'n_id' =>$n_id,
	'n_name' =>$n_name,
	'description' =>$description,
	'rating' =>$rating,
	'categorie' =>$categorie,
	'location' =>$location,
	'img' =>$img
	];

	array_push($nursery, $temp);
}

echo json_encode($nursery);

?>