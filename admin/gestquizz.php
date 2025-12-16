<?php
session_start();
require_once '../includes/connection.php';

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../login.php"); exit;
}

$stmt = $pdo->query("SELECT * FROM perguntas_quiz ORDER BY idioma, nivel, id DESC");
$todas_perguntas = $stmt->fetchAll();

$dados = [];
foreach ($todas_perguntas as $p) {
    $dados[$p['idioma']][$p['nivel']][] = $p;
}

$idiomas_map = [
    'en' => ['nome' => 'Inglês', 'flag' => '🇬🇧'],
    'fr' => ['nome' => 'Francês', 'flag' => '🇫🇷'],
    'es' => ['nome' => 'Espanhol', 'flag' => '🇪🇸'],
    'al' => ['nome' => 'Alemão', 'flag' => '🇩🇪']
];

$niveis = ['A1', 'A2', 'B1', 'B2', 'C1'];
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão - Polyglot Play</title>
    <link rel="icon" href="../imgs/logo.png" type="image/png">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<div class="d-flex" style="min-height: 100vh;">

    <div class="d-flex flex-column p-3 text-white bg-dark" style="width: 280px; height: 100vh; position: sticky; top: 0;">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4 fw-bold text-primary">Gestão</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active"><i class="bi bi-grid-fill me-2"></i> Gestão de Quizzes</a>
            </li>
            <li>
                <a href="../index.php" class="nav-link text-white"><i class="bi bi-box-arrow-up-right me-2"></i> Ver Site</a>
            </li>
        </ul>
        <hr>
        <a href="../logout.php" class="btn btn-danger w-100"><i class="bi bi-box-arrow-left me-2"></i> Logout</a>
    </div>

    <div class="flex-grow-1">
        
        <header class="bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 text-secondary">Organização de Perguntas</h5>
            <span class="small text-muted">Admin</span>
        </header>

        <div class="p-4">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 fw-bold mb-0">Perguntas por Idioma</h2>
                <a href="adicionar_pergunta.php" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Nova Pergunta</a>
            </div>

            <?php if (isset($_GET['status'])): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    Ação realizada com sucesso!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <?php 
                $first = true;
                foreach($idiomas_map as $code => $info): 
                    $active = $first ? 'active' : '';
                ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?php echo $active; ?> fw-bold" 
                            id="<?php echo $code; ?>-tab" 
                            data-bs-toggle="tab" 
                            data-bs-target="#<?php echo $code; ?>" 
                            type="button" role="tab">
                        <?php echo $info['flag'] . ' ' . $info['nome']; ?>
                    </button>
                </li>
                <?php 
                $first = false;
                endforeach; 
                ?>
            </ul>

            <div class="tab-content" id="myTabContent">
                
                <?php 
                $first = true;
                foreach($idiomas_map as $code => $info): 
                    $activeClass = $first ? 'show active' : '';
                    $first = false;
                ?>
                
                <div class="tab-pane fade <?php echo $activeClass; ?>" id="<?php echo $code; ?>" role="tabpanel">
                    
                    <?php if (isset($dados[$code])): ?>
                        
                        <?php foreach($niveis as $lvl): ?>
                            <?php if(isset($dados[$code][$lvl])): ?>
                                
                                <h5 class="border-bottom pb-2 mb-3 text-primary mt-4">
                                    <i class="bi bi-bar-chart-fill me-2"></i>Nível <?php echo $lvl; ?>
                                </h5>

                                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-3">
                                    <?php foreach($dados[$code][$lvl] as $p): ?>
                                    <div class="col">
                                        <div class="card h-100 border-0 shadow-sm">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span class="badge bg-light text-dark border">ID: <?php echo $p['id']; ?></span>
                                                    <span class="badge bg-success"><?php echo $p['nivel']; ?></span>
                                                </div>
                                                <p class="card-text text-muted small text-truncate">
                                                    <?php echo htmlspecialchars($p['pergunta']); ?>
                                                </p>
                                                <div class="d-flex justify-content-end gap-2 mt-2 pt-2 border-top">
                                                    <a href="editar_pergunta.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-outline-warning border-0"><i class="bi bi-pencil"></i></a>
                                                    <a href="eliminar_pergunta.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Apagar?');"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>

                            <?php endif; ?>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <div class="alert alert-light text-center border mt-3">
                            Ainda não há perguntas de <?php echo $info['nome']; ?>.
                        </div>
                    <?php endif; ?>

                </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>