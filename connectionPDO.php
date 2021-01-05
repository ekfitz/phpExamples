<?php

$user = 'root';
$pass = 'root';
$db = 'Vehicles';
$host = 'localhost';
$port = 8889;

 try {
     $dbh = new PDO('mysql:host=localhost;dbname=Vehicles', $user, $pass);
     foreach($dbh->query('SELECT * from Odometers') as $row) {
         print_r($row);
     }
     $dbh = null;
 } catch (PDOException $e) {
     print "Error!: " . $e->getMessage() . "<br/>";
     die();
 }
 ?>
