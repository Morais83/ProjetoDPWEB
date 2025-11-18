<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = $isLoggedIn ?? false;
$utilizador = $utilizador ?? 'utilizador';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="/trabalho/index.php">
            <img src="/trabalho/imgs/logo.png" alt="Logo Polyglot Play" class="logo-img me-2">
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
                        <li><a class="dropdown-item" href="/trabalho/aprender/apr_uk.php">Inglês</a></li>
                        <li><a class="dropdown-item" href="/trabalho/aprender/apr_fr.php">Francês</a></li>
                        <li><a class="dropdown-item" href="/trabalho/aprender/apr_es.php">Espanhol</a></li>
                        <li><a class="dropdown-item" href="/trabalho/aprender/apr_al.php">Alemão</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/trabalho/quizzes.php">Quizzes</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/trabalho/sobre.php">Sobre Nós</a>
                </li>

                <?php if ($isLoggedIn): ?>
                    <li class="nav-item dropdown ms-2">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-2"></i>
                            <span><?php echo htmlspecialchars($utilizador); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-header small text-muted">
                                Conta do utilizador
                            </li>
                            <li>
                                <a class="dropdown-item" href="/trabalho/perfil.php">
                                    Ver perfil
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="/trabalho/logout.php">
                                    Terminar sessão
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php elseif (!isset($hideLoginButton)): ?>
                    <li class="nav-item ms-2">
                        <a href="/trabalho/login.php" class="btn btn-primary rounded-3 px-3">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
