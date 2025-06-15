
<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // хешируем пароль

    // Подготовка и выполнение запроса
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Регистрация прошла успешно!</p>";
    } else {
        echo "<p style='color:red;'>Ошибка: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

<h2>Регистрация</h2>
<form method="post" action="">
  <label>Имя:</label><br>
  <input type="text" name="name" required><br>
  <label>Email:</label><br>
  <input type="email" name="email" required><br>
  <label>Пароль:</label><br>
  <input type="password" name="password" required><br><br>
  <button type="submit">Зарегистрироваться</button>
</form>
