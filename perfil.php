<?php
    session_start();
    require_once 'includes/connection.php';

    if (!isset($_SESSION['utilizador_id'])) {
        header("Location: login.php");
        exit;
    }

    $utilizador_id = $_SESSION['utilizador_id'];
    $stmt = $pdo->prepare("SELECT nome_utilizador, email, data_registo FROM utilizadores WHERE id_utilizador = ?");
    $stmt->execute([$utilizador_id]);
    $user_data = $stmt->fetch();

    if (!$user_data) {
        session_destroy();
        header("Location: login.php");
        exit;
    }

    $utilizador = $user_data['nome_utilizador'];
    $email = $user_data['email'];
    $data_registo = date('d/m/Y', strtotime($user_data['data_registo']));

    if (!$user_data) {
        session_destroy();
        header("Location: login.php");
        exit;
    }

    $stmt_stats = $pdo->prepare("
        SELECT 
            COUNT(*) as total_quizzes, 
            SUM(respostas_certas) as total_certas, 
            SUM(respostas_erradas) as total_erradas 
        FROM resultados_quiz 
        WHERE id_utilizador = ?");
    $stmt_stats->execute([$utilizador_id]);
    $stats = $stmt_stats->fetch();

    $quizzestotais   = $stats['total_quizzes'] ?? 0;
    $respostacorreta = $stats['total_certas'] ?? 0;
    $respostaerrada  = $stats['total_erradas'] ?? 0;
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Polyglot Play</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        define('PROJECT_ROOT', dirname(__FILE__)); 
        $BASE_URL = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
        if ($BASE_URL === '//') { $BASE_URL = '/'; }
        require_once(PROJECT_ROOT . '/includes/nav.php');
    ?>

    <main class="container py-5">
        <section class="row g-4 mb-4">
            <div class="col-lg-4">
                <div class="card p-4 h-100 shadow-sm">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="bi bi-person-circle" style="font-size: 3rem; color: #0d6efd;"></i>
                        </div>
                        <div>
                            <h1 class="h4 fw-bold mb-1">
                                Olá, <?php echo htmlspecialchars($utilizador); ?>
                            </h1>
                            <p class="mb-0 text-secondary small">
                                Membro Polyglot Play
                            </p>
                        </div>
                    </div>
                    <hr>
                    <p class="mb-2 small"><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                    <p class="mb-0 small text-secondary">Membro desde: <?php echo $data_registo; ?></p>
                    
                    <div class="mt-4">
                        <a href="logout.php" class="btn btn-outline-danger btn-sm w-100">Terminar Sessão</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="row g-3 mb-4">
                    <div class="col-sm-4">
                        <div class="card stat-card h-100 p-3 text-center shadow-sm border-0">
                            <p class="text-uppercase small text-muted mb-1">Quizzes Feitos</p>
                            <div class="h3 fw-bold mb-0 text-primary">
                                <?php echo $quizzestotais; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card stat-card h-100 p-3 text-center shadow-sm border-0">
                            <p class="text-uppercase small text-muted mb-1">Respostas Certas</p>
                            <div class="h3 fw-bold mb-0 text-success">
                                <?php echo $respostacorreta; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card stat-card h-100 p-3 text-center shadow-sm border-0">
                            <p class="text-uppercase small text-muted mb-1">Respostas Erradas</p>
                            <div class="h3 fw-bold mb-0 text-danger">
                                <?php echo $respostaerrada; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4">
                    <h2 class="h5 fw-bold mb-3">Resumo da tua aprendizagem</h2>
                    <p class="text-secondary mb-4">
                        Estas estatísticas mostram a tua evolução. Continua a praticar para aumentares a tua taxa de acerto!
                    </p>

                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Taxa de sucesso
                            <span class="fw-bold text-dark">
                                <?php
                                $total_perguntas = $respostacorreta + $respostaerrada;
                                $percentagem = $total_perguntas > 0 ? round(($respostacorreta / $total_perguntas) * 100) : 0;
                                echo $percentagem . '%';
                                ?>
                            </span>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentagem; ?>%"></div>
                            </div>
                        </li>
                    </ul>

                    <div class="text-center mt-2">
                        <a href="quizzes.php" class="btn btn-primary rounded-pill px-5">
                            <i class="bi bi-play-fill me-2"></i>Jogar Mais
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require('includes/footer.php'); ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>