
<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Car Rentals</title>
</head>
<body>
  <form action="insert.php" method="post">
      <p>
          <label for="firstName">Name:</label>
          <input type="text" name="name" id="vehicleName">
      </p>
      <p>
          <label for="lastName">License:</label>
          <input type="text" name="license" id="vehicleLicense">
      </p>
      <p>
          <label for="emailAddress">Odometer:</label>
          <input type="text" name="odometer" id="vehicleOdometer">
      </p>
      <input type="submit" value="Submit">
  </form>

</body>
</html>

<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Name</th><th>License</th><th>Odometer</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

try {
  $stmt = $dbh->prepare("SELECT Name, License, Odometer FROM Odometers");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

<html>
  <h1>
    <?php
    try {
      $stmt = $dbh->prepare("SELECT License FROM Odometers WHERE Name='Expedition'");
      $stmt->execute();

      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
      }
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
  </h1>
</html>
