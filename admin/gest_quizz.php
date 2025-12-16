<?php
session_start();
require_once '../includes/connection.php';

if (!isset($_SESSION['tipo_utilizador']) || $_SESSION['tipo_utilizador'] !== 'admin') {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Gerir Quizzes</title>
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
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                    <h2 class="h4 fw-bold mb-0">Perguntas por Idioma</h2>
                    <a href="adicionar_pergunta.php" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> <span class="d-none d-sm-inline">Nova Pergunta</span>
                        <span class="d-inline d-sm-none">Criar</span>
                    </a>
                </div>

                <ul class="nav nav-tabs mb-4 flex-nowrap overflow-auto" id="myTab" role="tablist">
                    <?php foreach($idiomas_map as $code => $info): ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-nowrap <?php echo ($code=='en')?'active':''; ?> fw-bold" 
                                    id="<?php echo $code; ?>-tab" 
                                    data-bs-toggle="tab" 
                                    data-bs-target="#<?php echo $code; ?>" 
                                    type="button">
                                <?php echo $info['flag'].' '.$info['nome']; ?>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <?php foreach($idiomas_map as $code => $info): ?>
                    <div class="tab-pane fade <?php echo ($code=='en')?'show active':''; ?>" id="<?php echo $code; ?>">
                        <?php if (isset($dados[$code])): ?>
                            <?php foreach($niveis as $lvl): ?>
                                <?php if(isset($dados[$code][$lvl])): ?>
                                    
                                    <h5 class="border-bottom pb-2 mb-3 text-primary mt-4 sticky-top bg-light py-2" style="top: 0px; z-index: 1;">
                                        Nível <?php echo $lvl; ?>
                                    </h5>
                                    
                                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-3">
                                        <?php foreach($dados[$code][$lvl] as $p): ?>
                                            <div class="col">
                                                <div class="card h-100 border-0 shadow-sm">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <span class="badge bg-success"><?php echo $p['nivel']; ?></span>
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm btn-light rounded-circle" type="button" data-bs-toggle="dropdown">
                                                                    <i class="bi bi-three-dots-vertical"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="editar_pergunta.php?id=<?php echo $p['id']; ?>">Editar</a></li>
                                                                    <li><a class="dropdown-item text-danger" href="eliminar_pergunta.php?id=<?php echo $p['id']; ?>">Eliminar</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <p class="small text-truncate mb-0"><?php echo htmlspecialchars($p['pergunta']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-light border text-center py-5">
                                <i class="bi bi-inbox fs-1 text-muted d-block mb-2"></i>
                                Sem perguntas registadas para este idioma.
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>