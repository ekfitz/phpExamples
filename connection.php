<?php

$user = 'root';
$pass = 'root';
$db = 'Vehicles';
$host = 'localhost';
$port = 8889;

 try {
     $dbh = new PDO('mysql:host=localhost;dbname=Vehicles', $user, $pass);
     print "connected";
 } catch (PDOException $e) {
     print "Error!: " . $e->getMessage() . "<br/>";
     die();
 }
 ?>
