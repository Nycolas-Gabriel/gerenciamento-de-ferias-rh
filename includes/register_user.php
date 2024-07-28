<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cargo = $_POST['cargo'];

    // Verificação do email
    if (strpos($email, '@coren-pe.gov.br') === false) {
        header("Location: ../pages/register.php?error=Email deve ser do domínio coren-pe.gov.br");
        exit();
    }

    // Verificação da senha
    if (!preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        header("Location: ../pages/register.php?error=A senha deve ter pelo menos 8 caracteres, incluindo um caractere especial, um número e uma letra maiúscula.");
        exit();
    }

    // Criptografando a senha
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Inserir o usuário no banco de dados
    $sql = "INSERT INTO Usuario (nome, email, senha, cargo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $cargo);
        if ($stmt->execute()) {
            header("Location: ../pages/login.php?success=Cadastro realizado com sucesso. Faça login.");
        } else {
            header("Location: ../pages/register.php?error=Erro ao cadastrar usuário. Tente novamente.");
        }
        $stmt->close();
    } else {
        // Exibir mensagem de erro se a preparação da consulta falhar
        die("Erro na consulta SQL: " . $conn->error);
    }

    $conn->close();
}
?>
