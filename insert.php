<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=Vehicles", "root", "root");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Attempt insert query execution
try{
    // Create prepared statement
    $sql = "INSERT INTO Odometers (Name, License, Odometer) VALUES (:name, :license, :odometer)";
    $stmt = $pdo->prepare($sql);

    // Bind parameters to statement
    $stmt->bindParam(':name', $_REQUEST['name']);
    $stmt->bindParam(':license', $_REQUEST['license']);
    $stmt->bindParam(':odometer', $_REQUEST['odometer']);

    // Execute the prepared statement
    $stmt->execute();
    header("Location:index.php");
    
} catch(PDOException $e){
    die("ERROR: Could not execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);
?>
