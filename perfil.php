<?php
session_start();
require_once 'includes/connection.php';

// VERIFICAÇÃO DE SEGURANÇA: Se não estiver logado, manda para o login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Buscar dados do utilizador à base de dados
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT nome_utilizador, email, data_registo FROM utilizadores WHERE id_utilizador = ?");
$stmt->execute([$user_id]);
$user_data = $stmt->fetch();

// Se por algum motivo o utilizador não for encontrado
if (!$user_data) {
    session_destroy();
    header("Location: login.php");
    exit;
}

// Variáveis para exibir na página
$utilizador = $user_data['nome_utilizador'];
$email = $user_data['email'];
$data_registo = date('d/m/Y', strtotime($user_data['data_registo']));

// (Opcional) Futuramente podes buscar isto à BD se criares uma tabela de resultados
$quizzestotais   = 0; 
$respostacorreta = 0;
$respostaerrada  = 0;
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
                <div class="alert alert-info border-0 rounded-3">
                    <h4 class="alert-heading h5"><i class="bi bi-info-circle me-2"></i>Bem-vindo ao teu painel!</h4>
                    <p class="mb-0">Aqui poderás ver o teu progresso em breve. Por enquanto, explora os quizzes disponíveis e diverte-te a aprender!</p>
                </div>
                
                <div class="text-center mt-5">
                     <a href="quizzes.php" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">
                        <i class="bi bi-play-fill me-2"></i>Jogar Agora
                    </a>
                </div>
            </div>
        </section>
    </main>

    <?php require('includes/footer.php'); ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>