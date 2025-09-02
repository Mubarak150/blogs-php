<?php 

// $credentials = ['localhost', 'root', '', 'user_blog']; 

// $connection = mysqli_connect(...$credentials); 

// if(!$connection ) {
//     die("cannot connect to the db due to the error: ".mysqli_connect_error());
// }

// echo "connected to db"; 



$host = 'localhost';
$dbname = 'user_blog';
$username = 'root'; 
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}