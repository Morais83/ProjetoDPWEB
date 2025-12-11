<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = $isLoggedIn ?? false;
$utilizador = $utilizador ?? 'utilizador';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo $BASE_URL; ?>index.php">
            <img src="<?php echo $BASE_URL; ?>imgs/logo.png" alt="Logo Polyglot Play" class="logo-img me-2">
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
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
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
                    <li class="nav-item dropdown ms-2">
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-header small text-muted">Conta do utilizador</li>
                            <li>
                                <a class="dropdown-item" href="<?php echo $BASE_URL; ?>perfil.php">
                                    Ver perfil
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="<?php echo $BASE_URL; ?>logout.php">
                                    Terminar sessão
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php elseif (!isset($hideLoginButton)): ?>
                    <li class="nav-item ms-2">
                        <a href="<?php echo $BASE_URL; ?>login.php" class="btn btn-primary rounded-3 px-3">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>