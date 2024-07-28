<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../styles/register.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>
        <form id="registerForm" action="../includes/register_user.php" method="POST">
            <div class="input-group" id="usernameGroup">
                <input type="text" name="username" placeholder="Nome de usuário" required>
                <span class="error-icon" id="usernameIcon">&#x26A0;</span>
                <span class="error-balloon" id="usernameError"></span>
            </div>
            <div class="input-group" id="emailGroup">
                <input type="email" id="email" name="email" placeholder="Email" required>
                <span class="error-icon" id="emailIcon">&#x26A0;</span>
                <span class="error-balloon" id="emailError">Email deve ser do domínio coren-pe.gov.br</span>
            </div>
            <div class="input-group" id="passwordGroup">
                <input type="password" id="password" name="password" placeholder="Senha" required>
                <span class="error-icon" id="passwordIcon">&#x26A0;</span>
                <span class="error-balloon" id="passwordError">Deve conter: mín 8 caracteres; 1 caractere especial @$!%*?&]; 1 número; 1 letra maiúscula.</span>
            </div>
            <div class="input-group" id="cargoGroup">
                <input type="text" name="cargo" placeholder="Cargo" required>
                <span class="error-icon" id="cargoIcon">&#x26A0;</span>
                <span class="error-balloon" id="cargoError"></span>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
        <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
        <?php
            if (isset($_GET['error'])) {
                echo "<p style='color:red;'>".htmlspecialchars($_GET['error'])."</p>";
            }
        ?>
    </div>
    <script src="../scripts/main.js"></script>
</body>
</html>
