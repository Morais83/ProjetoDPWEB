<?php
session_start();
require_once 'includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm-password'] ?? '';
    
    $errors = [];

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = "Todos os campos são obrigatórios.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "A senha e a confirmação não coincidem.";
    }
    
    if (empty($errors)) {
        $stmt_check = $pdo->prepare("SELECT id_utilizador FROM utilizadores WHERE nome_utilizador = ? OR email = ?");
        $stmt_check->execute([$username, $email]);
        
        if ($stmt_check->fetch()) {
            $errors[] = "Este nome de utilizador ou e-mail já estão registados.";
        }
    }
    
    if (empty($errors)) {
        
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO utilizadores (nome_utilizador, email, password_hash, tipo_utilizador) VALUES (?, ?, ?, 'user')";
        
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$username, $email, $password_hash]);

        if ($result) {
            $new_user_id = $pdo->lastInsertId();
            
            $_SESSION['user_id'] = $new_user_id;
            $_SESSION['username'] = $username;
            $_SESSION['user_role'] = 'user';
            
            header("Location: perfil.php");
            exit;
            
        } else {
            $errors[] = "Erro ao registar na base de dados.";
        }
    }
    
    if (!empty($errors)) {
        $error_message = implode(" | ", $errors);
        header("Location: registo.php?error=" . urlencode($error_message));
        exit;
    }

} else {
    header("Location: registo.php");
    exit;
}
?>