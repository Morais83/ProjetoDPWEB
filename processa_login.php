<?php
session_start();

require_once 'includes/connection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $login_input = trim($_POST['username'] ?? ''); 
    $password = $_POST['password'] ?? '';

    if (empty($login_input) || empty($password)) {
        header("Location: login.php?error=empty_fields");
        exit;
    }

    $stmt = $pdo->prepare("SELECT id_utilizador, nome_utilizador, password_hash, tipo_utilizador FROM utilizadores WHERE nome_utilizador = :login_input OR email = :login_input");
    $stmt->execute(['login_input' => $login_input]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {

        $_SESSION['user_id'] = $user['id_utilizador'];
        $_SESSION['username'] = $user['nome_utilizador']; 
        $_SESSION['user_role'] = $user['tipo_utilizador']; 

        if ($_SESSION['user_role'] === 'admin') {
            header("Location: admin/gestquizz.php"); 
            exit;
        } else {
            header("Location: perfil.php");
            exit;
        }

    } else {
        header("Location: login.php?error=invalid_credentials");
        exit;
    }

} else {
    header("Location: login.php");
    exit;
}
?>