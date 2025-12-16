<?php
session_start();
require_once 'includes/connection.php';

if (isset($_SESSION['utilizador_id']) && isset($_POST['certas'])) {
    
    $id_user = $_SESSION['utilizador_id'];
    $idioma = $_POST['idioma'];
    $nivel = $_POST['nivel'];
    $certas = (int)$_POST['certas'];
    $erradas = (int)$_POST['erradas'];

    $stmt = $pdo->prepare("INSERT INTO resultados_quiz (id_utilizador, idioma, nivel, respostas_certas, respostas_erradas) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$id_user, $idioma, $nivel, $certas, $erradas]);
    
    echo "Salvo";
}
?>