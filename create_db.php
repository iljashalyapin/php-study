<?php
 try {
    // подключаемся к серверу
    $conn = new PDO("mysql:host=localhost", "root", "alce1234");
     
    // SQL-выражение для создания базы данных
    $sql = "CREATE DATABASE testdb1";
    // выполняем SQL-выражение
    $conn->exec($sql);
    echo "Database has been created";
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
