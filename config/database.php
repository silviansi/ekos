<?php 
$servername = "localhost";
$username = "root";
$password = "Silvi@2405#";
$dbname = "ekos";

// Create connection
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    die("Koneksi gagal: " . $e->getMessage());
}