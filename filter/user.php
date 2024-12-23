<!DOCTYPE html>
<html>
<head>
<title>METANIT.COM</title>
<meta charset="utf-8" />
</head>
<body>
<?php
if(isset($_GET["id"]))
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=testdb1", "root", "alce1234");
        $sql = "SELECT * FROM users WHERE id = :userid";
        $stmt = $conn->prepare($sql);
        // привязываем значение параметра :userid к $_GET["id"]
        $stmt->bindValue(":userid", $_GET["id"]);
        // выполняем выражение и получаем пользователя по id
        $stmt->execute();
        if($stmt->rowCount() > 0){
            foreach ($stmt as $row) {
              $username = $row["name"];
              $userage = $row["age"];
             
              echo "<div>
                    <h3>Информация о пользователе</h3>
                    <p>Имя: $username</p>
                    <p>Возраст: $userage</p>
                </div>";
            }
        }
        else{
            echo "Пользователь не найден";
        }
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
</body>
</html>
