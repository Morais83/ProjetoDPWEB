<?php
session_start();

require_once 'includes/connection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $login = trim($_POST['utilizador'] ?? ''); 
    $password = $_POST['password'] ?? '';

    if (empty($login) || empty($password)) {
        header("Location: login.php?error=empty_fields");
        exit;
    }

    $stmt = $pdo->prepare("SELECT id_utilizador, nome_utilizador, password_hash, tipo_utilizador FROM utilizadores WHERE nome_utilizador = :login OR email = :login");
    $stmt->execute(['login' => $login]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {

        $_SESSION['utilizador_id'] = $user['id_utilizador'];
        $_SESSION['utilizador'] = $user['nome_utilizador']; 
        $_SESSION['tipo_utilizador'] = $user['tipo_utilizador']; 

        if ($_SESSION['tipo_utilizador'] === 'admin') {
            header("Location: admin/gest_quizz.php"); 
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