<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-dark bg-dark d-lg-none p-3 mb-3">
    <div class="container-fluid px-0">
        <span class="navbar-brand fw-bold">Gestão Interna</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="offcanvas-lg offcanvas-start bg-dark text-white h-100" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    
    <div class="offcanvas-header border-bottom border-secondary">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Polyglot Admin</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body d-flex flex-column p-3 h-100">
        <div class="d-none d-lg-flex align-items-center mb-3 mb-md-0 me-md-auto text-white">
            <span class="fw-bold fs-4">Gestão Interna</span>
        </div>
        <hr class="d-none d-lg-block text-secondary">

        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="gest_quizz.php" class="nav-link <?php echo ($currentPage == 'gest_quizz.php') ? 'active' : 'text-white'; ?>">
                    <i class="bi bi-grid-fill me-2"></i> Quizzes
                </a>
            </li>
            <li class="nav-item">
                <a href="gest_feedback.php" class="nav-link <?php echo ($currentPage == 'gest_feedback.php') ? 'active' : 'text-white'; ?>">
                    <i class="bi bi-chat-quote-fill me-2"></i> Feedbacks
                </a>
            </li>
            <li class="nav-item">
                <a href="gest_utilizadores.php" class="nav-link <?php echo ($currentPage == 'gest_utilizadores.php') ? 'active' : 'text-white'; ?>">
                    <i class="bi bi-people-fill me-2"></i> Utilizadores
                </a>
            </li>
            <li class="nav-item mt-3">
                <a href="../index.php" class="nav-link text-white-50">
                    <i class="bi bi-box-arrow-up-right me-2"></i> Ver Site
                </a>
            </li>
        </ul>
        
        <hr class="text-secondary">
        
        <a href="../logout.php" class="btn btn-danger w-100">
            <i class="bi bi-box-arrow-left me-2"></i> Logout
        </a>
    </div>
</div>