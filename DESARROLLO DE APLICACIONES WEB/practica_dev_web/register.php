<?php
    session_start();
    include('config.php');
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">Este correo ya existe</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO users(username,password,email) VALUES (:username,:password_hash,:email)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '<p class="success">Usuario creado</p>';
            } else {
                echo '<p class="error">Error</p>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
</head>

<body>
    <form method="post" action="" name="signup-form">
        <div class="form-element">
            <label>Usuario: </label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
        </div>
        <div class="form-element">
            <label>Email: </label>
            <input type="email" name="email" required />
        </div>
        <div class="form-element">
            <label>Contraseña: </label>
            <input type="password" name="password" required />
        </div>
        <button type="submit" name="register" value="register">Crear usuario</button>
    </form>
    <a href="index.php">Regresar a la página principal</a>
</body>

</html>