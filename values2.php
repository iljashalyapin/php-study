<!DOCTYPE html>
<html>
<head>
<title>METANIT.COM</title>
<meta charset="utf-8" />
</head>
<body>
<?php
if (isset($_POST["username"]) && isset($_POST["userage"])) {
     
    try {
        $conn = new PDO("mysql:host=localhost;dbname=testdb1", "root", "alce1234");
        $sql = "INSERT INTO users (name, age) VALUES (:username, :userage)";
        // определяем prepared statement
        $stmt = $conn->prepare($sql);
        // привязываем параметры к значениям
        $stmt->bindValue(":username", $_POST["username"]);
        $stmt->bindValue(":userage", $_POST["userage"]);
        // выполняем prepared statement
        $affectedRowsNumber = $stmt->execute();
        // если добавлена как минимум одна строка
        if($affectedRowsNumber > 0 ){
            echo "Data successfully added: name=" . $_POST["username"] ."  age= " . $_POST["userage"];  
        }
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
<h3>Create a new User</h3>
<form method="post">
    <p>User Name:
    <input type="text" name="username" /></p>
    <p>User Age:
    <input type="number" name="userage" /></p>
    <input type="submit" value="Save">
</form>
</body>
</html>
