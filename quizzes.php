<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polyglot Play - Todos os quizzes</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        define('PROJECT_ROOT', dirname(__FILE__)); 
        $BASE_URL = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
        if ($BASE_URL === '//') {
            $BASE_URL = '/'; 
        }
        require_once(PROJECT_ROOT . '/includes/nav.php');
    ?>

    <main class="container py-5">
        <section class="mb-4 text-center text-md-start">
            <h2 class="fw-bold mb-2">Escolhe o nível mais adequado para ti</h2>
            <p class="text-secondary">Cada língua está dividida em cinco níveis de dificuldade, seguindo a escala europeia CEFR.</p>
            <p><i class="bi bi-dot text-dark"></i><strong>A1</strong> e <strong>A2</strong> são níveis básicos, ideais para quem está a começar.</p>
            <p><i class="bi bi-dot text-dark"></i><strong>B1</strong> e <strong>B2</strong> representam conhecimento intermédio, onde já consegues compreender e criar frases mais complexas. </p>
            <p><i class="bi bi-dot text-dark"></i><strong>C1</strong> é avançado, indicado para quem domina grande parte do vocabulário e estruturas da língua.</p>
        </section>

        <section class="py-4">
            <div class="container">
                <div class="bg-warning rounded-pill text-center py-3">
                    <h2 class="fw-bold m-0">Línguas</h2>
                </div>
            </div>
        </section>

        <section>
            <div class="d-flex flex-wrap justify-content-center gap-5">
                <div class="dropdown lang-card-wrapper">
                    <button 
                        class="lang-card dropdown-toggle text-decoration-none text-reset border-0 bg-white"
                        type="button"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        aria-expanded="false">
                        <div class="flag" style="background-image:url('imgs/uk.png');"></div>
                        <p>Inglês</p>
                    </button>
                    <div class="dropdown-menu quiz-dropdown-menu p-2 shadow-sm">
                        <p class="text-secondary small mb-2 text-center">Escolhe a dificuldade</p>
                        <a href="jogar.php?idioma=en&nivel=A1" class="dropdown-item text-center small">Inglês A1</a>
                        <a href="jogar.php?idioma=en&nivel=A2" class="dropdown-item text-center small">Inglês A2</a>
                        <a href="jogar.php?idioma=en&nivel=B1" class="dropdown-item text-center small">Inglês B1</a>
                        <a href="jogar.php?idioma=en&nivel=B2" class="dropdown-item text-center small">Inglês B2</a>
                        <a href="jogar.php?idioma=en&nivel=C1" class="dropdown-item text-center small">Inglês C1</a>
                    </div>
                </div>

                <div class="dropdown lang-card-wrapper">
                    <button 
                        class="lang-card dropdown-toggle text-decoration-none text-reset border-0 bg-white"
                        type="button"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        aria-expanded="false">
                        <div class="flag" style="background-image:url('imgs/fr.png');"></div>
                        <p>Francês</p>
                    </button>
                    <div class="dropdown-menu quiz-dropdown-menu p-2 shadow-sm">
                        <p class="text-secondary small mb-2 text-center">Escolhe a dificuldade</p>
                        <a href="jogar.php?idioma=fr&nivel=A1" class="dropdown-item text-center small">Francês A1</a>
                        <a href="jogar.php?idioma=fr&nivel=A2" class="dropdown-item text-center small">Francês A2</a>
                        <a href="jogar.php?idioma=fr&nivel=B1" class="dropdown-item text-center small">Francês B1</a>
                        <a href="jogar.php?idioma=fr&nivel=B2" class="dropdown-item text-center small">Francês B2</a>
                        <a href="jogar.php?idioma=fr&nivel=C1" class="dropdown-item text-center small">Francês C1</a>
                    </div>
                </div>

                <div class="dropdown lang-card-wrapper">
                    <button 
                        class="lang-card dropdown-toggle text-decoration-none text-reset border-0 bg-white"
                        type="button"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        aria-expanded="false">
                        <div class="flag" style="background-image:url('imgs/es.png');"></div>
                        <p>Espanhol</p>
                    </button>
                    <div class="dropdown-menu quiz-dropdown-menu p-2 shadow-sm">
                        <p class="text-secondary small mb-2 text-center">Escolhe a dificuldade</p>
                        <a href="jogar.php?idioma=es&nivel=A1" class="dropdown-item text-center small">Espanhol A1</a>
                        <a href="jogar.php?idioma=es&nivel=A2" class="dropdown-item text-center small">Espanhol A2</a>
                        <a href="jogar.php?idioma=es&nivel=B1" class="dropdown-item text-center small">Espanhol B1</a>
                        <a href="jogar.php?idioma=es&nivel=B2" class="dropdown-item text-center small">Espanhol B2</a>
                        <a href="jogar.php?idioma=es&nivel=C1" class="dropdown-item text-center small">Espanhol C1</a>
                    </div>
                </div>

                <div class="dropdown lang-card-wrapper">
                    <button 
                        class="lang-card dropdown-toggle text-decoration-none text-reset border-0 bg-white"
                        type="button"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        aria-expanded="false">
                        <div class="flag" style="background-image:url('imgs/al.png');"></div>
                        <p>Alemão</p>
                    </button>
                    <div class="dropdown-menu quiz-dropdown-menu p-2 shadow-sm">
                        <p class="text-secondary small mb-2 text-center">Escolhe a dificuldade</p>
                        <a href="jogar.php?idioma=al&nivel=A1" class="dropdown-item text-center small">Alemão A1</a>
                        <a href="jogar.php?idioma=al&nivel=A2" class="dropdown-item text-center small">Alemão A2</a>
                        <a href="jogar.php?idioma=al&nivel=B1" class="dropdown-item text-center small">Alemão B1</a>
                        <a href="jogar.php?idioma=al&nivel=B2" class="dropdown-item text-center small">Alemão B2</a>
                        <a href="jogar.php?idioma=al&nivel=C1" class="dropdown-item text-center small">Alemão C1</a>
                    </div>
                </div>

                <div class="dropdown lang-card-wrapper">
                    <button 
                        class="lang-card dropdown-toggle text-decoration-none text-reset border-0 bg-white"
                        type="button"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        aria-expanded="false">
                        <div class="flag" style="background-image:url('imgs/bandeiras.png');"></div>
                        <p>Brevemente</p>
                    </button>
                    <div class="dropdown-menu quiz-dropdown-menu p-2 shadow-sm">
                        <p class="text-secondary small mb-2 text-center">Escolhe a dificuldade</p>
                        <span class="dropdown-item text-center small">Nível A1</span>
                        <span class="dropdown-item text-center small">Nível A2</span>
                        <span class="dropdown-item text-center small">Nível B1</span>
                        <span class="dropdown-item text-center small">Nível B2</span>
                        <span class="dropdown-item text-center small">Nível C1</span>
                    </div>
                </div>

                <div class="dropdown lang-card-wrapper">
                    <button 
                        class="lang-card dropdown-toggle text-decoration-none text-reset border-0 bg-white"
                        type="button"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        aria-expanded="false">
                        <div class="flag" style="background-image:url('imgs/bandeiras.png');"></div>
                        <p>Brevemente</p>
                    </button>
                    <div class="dropdown-menu quiz-dropdown-menu p-2 shadow-sm">
                        <p class="text-secondary small mb-2 text-center">Escolhe a dificuldade</p>
                        <span class="dropdown-item text-center small">Nível A1</span>
                        <span class="dropdown-item text-center small">Nível A2</span>
                        <span class="dropdown-item text-center small">Nível B1</span>
                        <span class="dropdown-item text-center small">Nível B2</span>
                        <span class="dropdown-item text-center small">Nível C1</span>
                    </div>
                </div>

                <div class="dropdown lang-card-wrapper">
                    <button 
                        class="lang-card dropdown-toggle text-decoration-none text-reset border-0 bg-white"
                        type="button"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        aria-expanded="false">
                        <div class="flag" style="background-image:url('imgs/bandeiras.png');"></div>
                        <p>Brevemente</p>
                    </button>
                    <div class="dropdown-menu quiz-dropdown-menu p-2 shadow-sm">
                        <p class="text-secondary small mb-2 text-center">Escolhe a dificuldade</p>
                        <span class="dropdown-item text-center small">Nível A1</span>
                        <span class="dropdown-item text-center small">Nível A2</span>
                        <span class="dropdown-item text-center small">Nível B1</span>
                        <span class="dropdown-item text-center small">Nível B2</span>
                        <span class="dropdown-item text-center small">Nível C1</span>
                    </div>
                </div>

                <div class="dropdown lang-card-wrapper">
                    <button 
                        class="lang-card dropdown-toggle text-decoration-none text-reset border-0 bg-white"
                        type="button"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        aria-expanded="false">
                        <div class="flag" style="background-image:url('imgs/bandeiras.png');"></div>
                        <p>Brevemente</p>
                    </button>
                    <div class="dropdown-menu quiz-dropdown-menu p-2 shadow-sm">
                        <p class="text-secondary small mb-2 text-center">Escolhe a dificuldade</p>
                        <span class="dropdown-item text-center small">Nível A1</span>
                        <span class="dropdown-item text-center small">Nível A2</span>
                        <span class="dropdown-item text-center small">Nível B1</span>
                        <span class="dropdown-item text-center small">Nível B2</span>
                        <span class="dropdown-item text-center small">Nível C1</span>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <?php 
        require('includes/footer.php');
    ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>