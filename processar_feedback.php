<?php
require_once('includes/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);
    $classificacao = filter_input(INPUT_POST, 'classificacao', FILTER_VALIDATE_INT);

    if (!$classificacao || $classificacao < 1 || $classificacao > 5) {
        $classificacao = 5;
    }

    if (empty($nome) || empty($mensagem)) {
        header("Location: index.php?status=erro_campos_vazios#feedback-form");
        exit;
    }

    $sql = "INSERT INTO feedback (nome, mensagem, classificacao) VALUES (:nome, :mensagem, :rating)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':mensagem', $mensagem);
        $stmt->bindParam(':rating', $classificacao);
        $stmt->execute();
        
        header("Location: index.php?status=feedback_sucesso#feedback-area");
        exit;

    } catch (PDOException $e) {
        header("Location: index.php?status=erro_bd");
        exit;
    }

} else {
    header("Location: index.php");
    exit;
}
?>