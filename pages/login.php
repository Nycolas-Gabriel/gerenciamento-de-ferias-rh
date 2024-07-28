<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="../includes/login_user.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Login</button>
        </form>
        <p>Não tem uma conta? <a href="register.php">Cadastre-se</a></p>
        <?php
            if (isset($_GET['error'])) {
                echo "<p style='color:red;'>".htmlspecialchars($_GET['error'])."</p>";
            }
        ?>
    </div>
</body>
</html>
