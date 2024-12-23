<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=testdb1", "root", "alce1234");
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    echo "<table><tr><th>Id</th><th>Name</th><th>Age</th></tr>";
    while($row = $result->fetch()){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
