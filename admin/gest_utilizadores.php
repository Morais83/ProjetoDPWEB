<?php
    session_start();
    require_once '../includes/connection.php';

    if (!isset($_SESSION['tipo_utilizador']) || $_SESSION['tipo_utilizador'] !== 'admin') {
        header("Location: ../login.php"); exit;
    }

    if (isset($_GET['delete_user'])) {
        $id_para_apagar = $_GET['delete_user'];
        
        if ($id_para_apagar == $_SESSION['user_id']) {
            header("Location: gest_utilizadores.php?status=erro_proprio");
            exit;
        }

        try {
            $pdo->prepare("DELETE FROM resultados_quiz WHERE id_utilizador = ?")->execute([$id_para_apagar]);
            
            $stmt_nome = $pdo->prepare("SELECT nome_utilizador FROM utilizadores WHERE id_utilizador = ?");
            $stmt_nome->execute([$id_para_apagar]);
            $user_nome = $stmt_nome->fetchColumn();

            if ($user_nome) {
                $pdo->prepare("DELETE FROM feedback WHERE nome = ?")->execute([$user_nome]);
            }

            $pdo->prepare("DELETE FROM utilizadores WHERE id_utilizador = ?")->execute([$id_para_apagar]);
            
            header("Location: gest_utilizadores.php?status=deleted");
            exit;

        } catch (PDOException $e) {
            die("Erro ao apagar: " . $e->getMessage());
        }
    }

    $sql = "SELECT u.*, 
            COUNT(r.id) as total_quizzes, 
            SUM(r.respostas_certas) as total_certas,
            SUM(r.respostas_erradas) as total_erradas
            FROM utilizadores u 
            LEFT JOIN resultados_quiz r ON u.id_utilizador = r.id_utilizador 
            WHERE u.tipo_utilizador != 'admin' 
            GROUP BY u.id_utilizador
            ORDER BY u.id_utilizador DESC";

    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Gerir Utilizadores</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-icons.min.css">
    
    <style>
        @media (min-width: 992px) {
            .sidebar-col {
                min-height: 100vh;
            }
        }
        .table > :not(caption) > * > * {
            vertical-align: middle;
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
                <h2 class="mb-4 fw-bold">Gestão de Utilizadores</h2>

                <?php if (isset($_GET['status']) && $_GET['status'] == 'deleted'): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="bi bi-check-circle-fill me-2"></i> Utilizador eliminado com sucesso.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['status']) && $_GET['status'] == 'erro_proprio'): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Não podes apagar a tua própria conta enquanto estás logado!
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-4">ID</th>
                                        <th>Utilizador</th>
                                        <th>Data Registo</th> 
                                        <th class="text-center">Quizzes</th>
                                        <th class="text-center" style="min-width: 150px;">Desempenho</th>
                                        <th class="text-end pe-4">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($users) > 0): ?>
                                        <?php foreach ($users as $u): 
                                            $total_perguntas = $u['total_certas'] + $u['total_erradas'];
                                            $percentagem = ($total_perguntas > 0) ? round(($u['total_certas'] / $total_perguntas) * 100) : 0;
                                            
                                            $cor = ($percentagem < 50) ? 'bg-danger' : (($percentagem < 75) ? 'bg-warning' : 'bg-success');
                                            
                                            $data_formatada = date('d/m/Y', strtotime($u['data_registo']));
                                        ?>
                                        <tr>
                                            <td class="ps-4 text-muted small">#<?php echo $u['id_utilizador']; ?></td>
                                            
                                            <td>
                                                <div class="d-flex align-items-center py-2">
                                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 40px; height: 40px;">
                                                        <?php echo strtoupper(substr($u['nome_utilizador'], 0, 1)); ?>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold text-dark"><?php echo htmlspecialchars($u['nome_utilizador']); ?></div>
                                                        <div class="small text-muted"><?php echo htmlspecialchars($u['email']); ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td class="text-secondary small text-nowrap">
                                                <i class="bi bi-calendar-event me-1"></i> <?php echo $data_formatada; ?>
                                            </td>

                                            <td class="text-center fw-bold text-secondary">
                                                <?php echo $u['total_quizzes']; ?>
                                            </td>
                                            
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2 fw-bold small text-muted" style="width: 35px; text-align: right;"><?php echo $percentagem; ?>%</span>
                                                    <div class="progress flex-grow-1" style="height: 6px;">
                                                        <div class="progress-bar <?php echo $cor; ?>" style="width: <?php echo $percentagem; ?>%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td class="text-end pe-4">
                                                <a href="gest_utilizadores.php?delete_user=<?php echo $u['id_utilizador']; ?>" 
                                                class="btn btn-sm btn-outline-danger"
                                                title="Eliminar Utilizador"
                                                onclick="return confirm('Tem a certeza? Isto apaga o utilizador e todo o histórico dele permanentemente.');">
                                                    <i class="bi bi-trash"></i> <span class="d-none d-md-inline">Eliminar</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center py-5 text-muted">
                                                <i class="bi bi-people fs-1 d-block mb-2"></i>
                                                Nenhum utilizador registado (exceto admins).
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div> </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>