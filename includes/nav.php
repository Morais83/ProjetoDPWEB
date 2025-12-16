<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($BASE_URL)) {
    $BASE_URL = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
}

if ($BASE_URL === '//') { $BASE_URL = '/'; }

$isLoggedIn = isset($_SESSION['utilizador_id']);
$utilizador = isset($_SESSION['utilizador']) ? $_SESSION['utilizador'] : 'Visitante';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo $BASE_URL; ?>index.php">
            <img src="<?php echo $BASE_URL; ?>imgs/logo.png" alt="Logo Polyglot Play" class="logo-img">
            <span class="fw-bold fs-1">Polyglot Play</span>
        </a>

        <button class="navbar-toggler" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" 
                aria-controls="navbarNav" 
                aria-expanded="false" 
                aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Aprende Connosco
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo $BASE_URL; ?>aprender/apr_en.php">Inglês</a></li>
                        <li><a class="dropdown-item" href="<?php echo $BASE_URL; ?>aprender/apr_fr.php">Francês</a></li>
                        <li><a class="dropdown-item" href="<?php echo $BASE_URL; ?>aprender/apr_es.php">Espanhol</a></li>
                        <li><a class="dropdown-item" href="<?php echo $BASE_URL; ?>aprender/apr_al.php">Alemão</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $BASE_URL; ?>quizzes.php">Quizzes</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $BASE_URL; ?>sobre.php">Sobre Nós</a>
                </li>

                <?php if ($isLoggedIn): ?>
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle btn btn-outline-primary border-0 rounded-pill px-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> 
                            <?php echo htmlspecialchars($utilizador); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li class="dropdown-header small text-muted">A minha conta</li>
                            <li>
                                <a class="dropdown-item" href="<?php echo $BASE_URL; ?>perfil.php">
                                    <i class="bi bi-person me-2"></i>Ver perfil
                                </a>
                            </li>
                            
                            <?php if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] === 'admin'): ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo $BASE_URL; ?>admin/gest_quizz.php">
                                    <i class="bi bi-gear me-2"></i>Administração
                                </a>
                            </li>
                            <?php endif; ?>

                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="<?php echo $BASE_URL; ?>logout.php">
                                    <i class="bi bi-box-arrow-right me-2"></i>Terminar sessão
                                </a>
                            </li>
                        </ul>
                    </li>

                <?php else: ?>
                    <?php if (!isset($hideLoginButton)): ?>
                        <li class="nav-item ms-3">
                            <a href="<?php echo $BASE_URL; ?>login.php" class="btn btn-primary rounded-pill px-4 shadow-sm">Login</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
<div style="margin-top: 120px;"></div>