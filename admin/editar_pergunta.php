<?php
session_start();
require_once '../includes/connection.php';

if (!isset($_SESSION['tipo_utilizador']) || $_SESSION['tipo_utilizador'] !== 'admin') {
    header("Location: ../login.php"); exit;
}

if (!isset($_GET['id'])) {
    header("Location: gest_quizz.php"); exit;
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE perguntas_quiz SET 
            idioma = :idioma, nivel = :nivel, pergunta = :pergunta,
            opcao_a = :a, opcao_b = :b, opcao_c = :c, opcao_d = :d, resposta_correta = :correta
            WHERE id = :id";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':idioma' => $_POST['idioma'], ':nivel' => $_POST['nivel'], ':pergunta' => $_POST['pergunta'],
        ':a' => $_POST['op_a'], ':b' => $_POST['op_b'], ':c' => $_POST['op_c'], ':d' => $_POST['op_d'],
        ':correta' => $_POST['correta'], ':id' => $id
    ]);
    header("Location: gest_quizz.php?status=editado");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM perguntas_quiz WHERE id = ?");
$stmt->execute([$id]);
$p = $stmt->fetch();

if (!$p) { header("Location: gest_quizz.php"); exit; }
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Editar Pergunta</title>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="fw-bold text-warning mb-0">
                                <i class="bi bi-pencil-square me-2"></i>Editar Pergunta
                            </h2>
                            <span class="badge bg-secondary">ID: <?php echo $p['id']; ?></span>
                        </div>
                    </div>
                    
                    <div class="card-body p-4">
                        <form method="POST">
                            <div class="row mb-3 g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Idioma</label>
                                    <select name="idioma" class="form-select">
                                        <option value="en" <?php if($p['idioma']=='en') echo 'selected'; ?>>Inglês 🇬🇧</option>
                                        <option value="fr" <?php if($p['idioma']=='fr') echo 'selected'; ?>>Francês 🇫🇷</option>
                                        <option value="es" <?php if($p['idioma']=='es') echo 'selected'; ?>>Espanhol 🇪🇸</option>
                                        <option value="al" <?php if($p['idioma']=='al') echo 'selected'; ?>>Alemão 🇩🇪</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Dificuldade</label>
                                    <select name="nivel" class="form-select">
                                        <option value="A1" <?php if($p['nivel']=='A1') echo 'selected'; ?>>A1 (Iniciante)</option>
                                        <option value="A2" <?php if($p['nivel']=='A2') echo 'selected'; ?>>A2 (Básico)</option>
                                        <option value="B1" <?php if($p['nivel']=='B1') echo 'selected'; ?>>B1 (Intermédio)</option>
                                        <option value="B2" <?php if($p['nivel']=='B2') echo 'selected'; ?>>B2 (Independente)</option>
                                        <option value="C1" <?php if($p['nivel']=='C1') echo 'selected'; ?>>C1 (Avançado)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold small text-uppercase text-muted">Pergunta</label>
                                <textarea name="pergunta" class="form-control" rows="3" required><?php echo htmlspecialchars($p['pergunta']); ?></textarea>
                            </div>

                            <hr class="text-secondary opacity-25 my-4">

                            <label class="form-label fw-bold small text-uppercase text-muted mb-3">Opções de Resposta</label>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light fw-bold">A</span>
                                        <input type="text" name="op_a" class="form-control" value="<?php echo htmlspecialchars($p['opcao_a']); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light fw-bold">B</span>
                                        <input type="text" name="op_b" class="form-control" value="<?php echo htmlspecialchars($p['opcao_b']); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light fw-bold">C</span>
                                        <input type="text" name="op_c" class="form-control" value="<?php echo htmlspecialchars($p['opcao_c']); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light fw-bold">D</span>
                                        <input type="text" name="op_d" class="form-control" value="<?php echo htmlspecialchars($p['opcao_d']); ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 bg-light p-3 rounded border">
                                <label class="d-block form-label fw-bold mb-2">Qual é a opção correta?</label>
                                <div class="d-flex flex-wrap gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correta" id="radioA" value="a" <?php if($p['resposta_correta']=='a') echo 'checked'; ?>>
                                        <label class="form-check-label" for="radioA">Opção A</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correta" id="radioB" value="b" <?php if($p['resposta_correta']=='b') echo 'checked'; ?>>
                                        <label class="form-check-label" for="radioB">Opção B</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correta" id="radioC" value="c" <?php if($p['resposta_correta']=='c') echo 'checked'; ?>>
                                        <label class="form-check-label" for="radioC">Opção C</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correta" id="radioD" value="d" <?php if($p['resposta_correta']=='d') echo 'checked'; ?>>
                                        <label class="form-check-label" for="radioD">Opção D</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="gest_quizz.php" class="btn btn-outline-secondary px-4">Cancelar</a>
                                <button type="submit" class="btn btn-warning px-4 fw-bold">
                                    <i class="bi bi-check2-square me-1"></i> Guardar Alterações
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