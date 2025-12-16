<?php
session_start();
require_once '../includes/connection.php';

if (!isset($_SESSION['tipo_utilizador']) || $_SESSION['tipo_utilizador'] !== 'admin') {
    header("Location: ../login.php"); exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM perguntas_quiz WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: gest_quizz.php?status=eliminado");
exit;
?>