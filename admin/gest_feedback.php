<?php
session_start();
require_once '../includes/connection.php';

if (!isset($_SESSION['tipo_utilizador']) || $_SESSION['tipo_utilizador'] !== 'admin') {
    header("Location: ../login.php"); exit;
}

if (isset($_GET['delete_id'])) {
    $stmt = $pdo->prepare("DELETE FROM feedback WHERE id = ?");
    $stmt->execute([$_GET['delete_id']]);
    header("Location: gest_feedback.php?status=deleted");
    exit;
}

$feedbacks = $pdo->query("SELECT * FROM feedback ORDER BY data_submissao DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Gerir Feedbacks</title>
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
                <h2 class="mb-4 fw-bold">Gestão de Feedbacks</h2>

                <?php if (isset($_GET['status'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> Feedback eliminado com sucesso.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (count($feedbacks) > 0): ?>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                        <?php foreach ($feedbacks as $f): ?>
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h5 class="fw-bold text-primary mb-0"><?php echo htmlspecialchars($f['nome']); ?></h5>
                                            <small class="text-muted" style="font-size: 0.8rem;">
                                                <?php echo date('d/m/Y \à\s H:i', strtotime($f['data_submissao'])); ?>
                                            </small>
                                        </div>
                                        
                                        <div class="text-warning text-nowrap">
                                            <?php 
                                            $estrelas = $f['classificacao'] ?? 5; 
                                            for($i=1; $i<=5; $i++) echo ($i <= $estrelas) ? '<i class="bi bi-star-fill"></i>' : '<i class="bi bi-star"></i>';
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <hr class="my-2 opacity-25">
                                    
                                    <p class="card-text text-secondary fst-italic">
                                        <i class="bi bi-quote me-1"></i><?php echo htmlspecialchars($f['mensagem']); ?>
                                    </p>
                                </div>
                                <div class="card-footer bg-white border-top-0 d-flex justify-content-end pb-3 pt-0">
                                    <a href="gest_feedback.php?delete_id=<?php echo $f['id']; ?>" 
                                       class="btn btn-sm btn-outline-danger" 
                                       onclick="return confirm('Tem a certeza que deseja eliminar este feedback?');">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-light border text-center py-5 mt-4">
                        <i class="bi bi-chat-left-text fs-1 text-muted d-block mb-3"></i>
                        Ainda não existem feedbacks submetidos.
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>