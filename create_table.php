<?php
try {
    // подключаемся к серверу
    $conn = new PDO("mysql:host=localhost;dbname=testdb1", "root", "alce1234");
     
    // SQL-выражение для создания таблицы
    $sql = "create table users (id integer auto_increment primary key, name varchar(30), age integer);";
    // выполняем SQL-выражение
    $conn->exec($sql);
    echo "Table Users has been created";
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
