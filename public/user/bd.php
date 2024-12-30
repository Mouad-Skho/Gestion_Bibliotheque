<?php 

// $link = mysqli_connect('localhost', 'root', '');
// 	if (!$link) 
// 	{
// 	    die('Could not connect: ' . mysqli_error($link));
// 	}
// 	mysqli_select_db($link,'gestion_bibliotheque');
try {
	//code...
	$pdo = new PDO ('mysql:host=localhost;dbname=gestion_bibliotheque','root','');
} catch (PDOException $e) {
	echo "<p>Erreur: ".$e->getMessage();
	die();
}

 ?>