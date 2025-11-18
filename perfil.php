<?php
$isLoggedIn      = true;
$utilizador      = 'João Silva';
$email           = 'joao.silva@example.com';
$quizzestotais   = 12;
$respostacorreta = 85;
$respostaerrada  = 15;
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
    <?php require('includes/nav.php'); ?>

    <main class="container py-5">
        <section class="row g-4 mb-4">
            <div class="col-lg-4">
                <div class="card p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
                        </div>
                        <div>
                            <h1 class="h4 fw-bold mb-1">
                                Olá, <?php echo htmlspecialchars($utilizador); ?>
                            </h1>
                            <p class="mb-0 text-secondary small">
                                Utilizador Polyglot Play
                            </p>
                        </div>
                    </div>
                    <p class="mb-1 small"><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                    <p class="mb-0 small text-secondary">Conta criada em: 01/01/2025</p>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="card stat-card h-100 p-3 text-center">
                            <p class="text-uppercase small text-muted mb-1">Quizzes feitos</p>
                            <div class="h3 fw-bold mb-0">
                                <?php echo $quizzestotais; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card stat-card h-100 p-3 text-center">
                            <p class="text-uppercase small text-muted mb-1">Respostas certas</p>
                            <div class="h3 fw-bold mb-0">
                                <?php echo $respostacorreta; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card stat-card h-100 p-3 text-center">
                            <p class="text-uppercase small text-muted mb-1">Respostas erradas</p>
                            <div class="h3 fw-bold mb-0 text-danger">
                                <?php echo $respostaerrada; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-4">
            <h2 class="h5 fw-bold mb-3">Resumo da tua aprendizagem</h2>
            <p class="text-secondary">
                Estas estatísticas vão ajudar-te a acompanhar a tua evolução. 
                Quanto mais quizzes fizeres, mais claro ficas sobre os temas que dominas
                e aqueles que precisas de rever.
            </p>

            <ul class="list-group mb-4">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Percentagem de acertos
                    <span class="fw-semibold">
                        <?php
                        $percentagem = $quizzestotais > 0 ? round(($respostacorreta / max(1, $respostacorreta + $respostaerrada)) * 100) : 0;
                        echo $percentagem . '%';
                        ?>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Total de perguntas respondidas
                    <span class="fw-semibold">
                        <?php echo $respostacorreta + $respostaerrada; ?>
                    </span>
                </li>
            </ul>

            <a href="quizzes.php" class="btn btn-primary rounded-3 px-4">
                Continuar a praticar quizzes
            </a>
        </section>
    </main>

    <?php require('includes/footer.php'); ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>