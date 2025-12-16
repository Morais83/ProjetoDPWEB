<?php
session_start();
require_once '../includes/connection.php';

if (!isset($_SESSION['tipo_utilizador']) || $_SESSION['tipo_utilizador'] !== 'admin') {
    header("Location: ../login.php"); exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idioma = $_POST['idioma'];
    $nivel = $_POST['nivel'];
    $pergunta = trim($_POST['pergunta']);
    $op_a = trim($_POST['op_a']);
    $op_b = trim($_POST['op_b']);
    $op_c = trim($_POST['op_c']);
    $op_d = trim($_POST['op_d']);
    $correta = $_POST['correta'];

    if ($pergunta && $op_a && $op_b) {
        $sql = "INSERT INTO perguntas_quiz (idioma, nivel, pergunta, opcao_a, opcao_b, opcao_c, opcao_d, resposta_correta) 
                VALUES (:idioma, :nivel, :pergunta, :a, :b, :c, :d, :correta)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':idioma' => $idioma, ':nivel' => $nivel, ':pergunta' => $pergunta,
            ':a' => $op_a, ':b' => $op_b, ':c' => $op_c, ':d' => $op_d, ':correta' => $correta
        ]);
        header("Location: gest_quizz.php?status=criado");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Nova Pergunta</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-icons.min.css">
    
    <style>
        @media (min-width: 992px) {
            .sidebar-col {
                min-height: 100vh;
            }
        }
    </style>
</head>
<body class="bg-light">

<div class="container-fluid">
    <div class="row">
        
        <div class="col-lg-3 col-xl-2 p-0 bg-dark sidebar-col">
            <?php require_once 'includes/admin_nav.php'; ?>
        </div>

        <div class="col-12 col-lg-9 col-xl-10">
            <div class="p-4">
                
                <div class="card border-0 shadow-sm mx-auto" style="max-width: 800px;">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                        <h2 class="fw-bold text-primary mb-0">Adicionar Nova Pergunta</h2>
                    </div>
                    
                    <div class="card-body p-4">
                        <form method="POST">
                            <div class="row mb-3 g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Idioma</label>
                                    <select name="idioma" class="form-select" required>
                                        <option value="en">Inglês 🇬🇧</option>
                                        <option value="fr">Francês 🇫🇷</option>
                                        <option value="es">Espanhol 🇪🇸</option>
                                        <option value="al">Alemão 🇩🇪</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Dificuldade</label>
                                    <select name="nivel" class="form-select" required>
                                        <option value="A1">A1 (Iniciante)</option>
                                        <option value="A2">A2 (Básico)</option>
                                        <option value="B1">B1 (Intermédio)</option>
                                        <option value="B2">B2 (Independente)</option>
                                        <option value="C1">C1 (Avançado)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold small text-uppercase text-muted">Pergunta</label>
                                <textarea name="pergunta" class="form-control" rows="3" placeholder="Escreva a pergunta aqui..." required></textarea>
                            </div>

                            <hr class="text-secondary opacity-25 my-4">

                            <label class="form-label fw-bold small text-uppercase text-muted mb-3">Opções de Resposta</label>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light fw-bold">A</span>
                                        <input type="text" name="op_a" class="form-control" placeholder="Opção A" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light fw-bold">B</span>
                                        <input type="text" name="op_b" class="form-control" placeholder="Opção B" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light fw-bold">C</span>
                                        <input type="text" name="op_c" class="form-control" placeholder="Opção C" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light fw-bold">D</span>
                                        <input type="text" name="op_d" class="form-control" placeholder="Opção D" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 bg-light p-3 rounded border">
                                <label class="d-block form-label fw-bold mb-2">Qual é a opção correta?</label>
                                <div class="d-flex flex-wrap gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correta" id="radioA" value="a" required>
                                        <label class="form-check-label" for="radioA">Opção A</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correta" id="radioB" value="b">
                                        <label class="form-check-label" for="radioB">Opção B</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correta" id="radioC" value="c">
                                        <label class="form-check-label" for="radioC">Opção C</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correta" id="radioD" value="d">
                                        <label class="form-check-label" for="radioD">Opção D</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="gest_quizz.php" class="btn btn-outline-secondary px-4">Cancelar</a>
                                <button type="submit" class="btn btn-primary px-4 fw-bold">
                                    <i class="bi bi-save me-1"></i> Guardar Pergunta
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>