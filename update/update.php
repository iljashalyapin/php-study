<?php 
try {
    $conn = new PDO("mysql:host=localhost;dbname=testdb1", "root", "alce1234");
}
catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
<title>METANIT.COM</title>
<meta charset="utf-8" />
</head>
<body>
<?php
// если запрос GET
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $userid = $_GET["id"];
    $sql = "SELECT * FROM users WHERE id = :userid";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":userid", $userid);
    // выполняем выражение и получаем пользователя по id
    $stmt->execute();
    if($stmt->rowCount() > 0){
        foreach ($stmt as $row) {
            $username = $row["name"];
            $userage = $row["age"];
        }
        echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$userid' />
                    <p>Имя:
                    <input type='text' name='name' value='$username' /></p>
                    <p>Возраст:
                    <input type='number' name='age' value='$userage' /></p>
                    <input type='submit' value='Сохранить' />
            </form>";
    }
    else{
        echo "Пользователь не найден";
    }
}
elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["age"])) {
      
    $sql = "UPDATE users SET name = :username, age = :userage WHERE id = :userid";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":userid", $_POST["id"]);
    $stmt->bindValue(":username", $_POST["name"]);
    $stmt->bindValue(":userage", $_POST["age"]);
          
    $stmt->execute();
    header("Location: index.php");
}
else{
    echo "Некорректные данные";
}
?>
</body>
</html>
