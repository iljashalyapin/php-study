<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=testdb1", "root", "alce1234");
     
    $sql = "INSERT INTO users (name, age) VALUES 
            ('Sam', 41), 
            ('Bob', 29), 
            ('Alice', 32)";
    $affectedRowsNumber = $conn->exec($sql);
    echo "В таблицу Users добавлено строк: $affectedRowsNumber";
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
