<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polyglot Play</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        require_once('includes/connection.php');
        define('PROJECT_ROOT', dirname(__FILE__)); 
        $BASE_URL = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
        if ($BASE_URL === '//') {
            $BASE_URL = '/'; 
        }
        require_once(PROJECT_ROOT . '/includes/nav.php');
        $sql = "SELECT nome, mensagem, classificacao FROM feedback ORDER BY data_submissao DESC LIMIT 9";
        $stmt = $pdo->query($sql);
        $feedbacks = $stmt->fetchAll();
    ?>

    <main class="container py-5 text-left">
        <!---INTRO--->
        <section class="row align-items-center g-4 mb-5">
            <div class="col-lg-7">
                <h1 class="display-5 fw-bold lh-tight mb-3">
                Aprende línguas com<br> quizzes rápidos e divertidos.
                </h1>
                <p class="text-secondary mb-4">
                Responde, ganha pontos e desbloqueia conquistas. Estuda todos os dias em
                sessões de 5 minutos e vê a tua evolução.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="quizzes.php" class="btn btn-primary btn-lg rounded-3 px-3">Começar agora</a>
                </div>
            </div>

            <!---EXEMPLO QUIZ--->
            <div class="col-lg-5">
                <div class="card quiz-demo border rounded-3 shadow-sm p-3">
                    <fieldset class="mb-2">
                        <div class="q-title fw-semibold mb-2">Exemplo de Pergunta:</div>
                        <div class="q-title mb-2">1) “Good morning” significa:</div>
                        <div class="vstack gap-1 mt-1">
                            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
                                <input type="radio" name="qDemo1" value="a" disabled>a) Boa noite
                            </label>

                            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
                                <input type="radio" name="qDemo1" value="b" disabled>b) Boa tarde
                            </label>

                            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
                                <input type="radio" name="qDemo1" value="c" checked disabled>c) Bom dia
                            </label>

                            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
                                <input type="radio" name="qDemo1" value="d" disabled>d) Adeus
                            </label>
                        </div>

                        <div class="small text-success mt-2 d-flex align-items-center gap-1">
                            <i class="bi bi-check2-circle"></i> Correto!
                        </div>
                    </fieldset>
                </div>
            </div>
        </section>

        <!---PORQUE APRENDER--->
        <section class="content text-left py-5">
            <div class="container">
                <h2 class="fw-bold mb-4">Porquê aprender com o Polyglot Play?</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 p-3">
                            <h5 class="fw-bold mb-2">Aprendizagem eficaz</h5>
                            <p class="mb-0 text-secondary">
                                Sessões curtas e quizzes interativos que ajudam a reter melhor o vocabulário.
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 p-3">
                            <h5 class="fw-bold mb-2">Ganha conquistas</h5>
                            <p class="mb-0 text-secondary">
                                Completa desafios e desbloqueia medalhas à medida que evoluis.
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 p-3">
                            <h5 class="fw-bold mb-2">Aprende ao teu ritmo</h5>
                            <p class="mb-0 text-secondary">
                                Escolhe o idioma e progride de forma divertida, quando e onde quiseres.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!---HIGHLIGHT--->
        <section class="stats-highlight py-4">
            <div class="container">
                <div class="bg-warning rounded-pill px-4 py-3">
                    <div class="row text-center align-items-center g-3">
                        <div class="col-12 col-md-4">
                            <div class="h5 fw-semibold mt-2">Múltiplos dispositivos</div>
                            <div class="text-body-secondary">Funciona em telemóvel, tablet e PC</div>
                        </div>
                        <div class="col-12 col-md-4 divider-md">
                            <div class="h4 mb-0 fw-bold">95%</div>
                            <div class="text-body-secondary">dos utilizadores dizem que melhoraram o vocabulário</div>
                            <div class="h5 fw-semibold mt-2">4 idiomas para explorar</div>
                        </div>
                        <div class="col-12 col-md-4 divider-md">
                            <div class="h4 mb-0 fw-bold">60 Milhões</div>
                            <div class="text-body-secondary">de estudantes</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!---COMO FUNCIONA--->
        <section class="content text-left py-5">
            <div class="container">
                <h2 class="fw-bold mb-4">Como funciona</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 p-3">
                            <h5 class="fw-bold mb-2">Escolhe um quiz</h5>
                            <p class="mb-0 text-secondary">Abre um dos idiomas e começa com perguntas simples.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 p-3">
                            <h5 class="fw-bold mb-2">Responde e aprende</h5>
                            <p class="mb-0 text-secondary">Lê a pergunta, escolhe a resposta e vê se está certo — tudo em poucos segundos.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 p-3">
                            <h5 class="fw-bold mb-2">Repete diariamente</h5>
                            <p class="mb-0 text-secondary">Com 5 minutos por dia evoluis de forma consistente (e divertida!).</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!---IDIOMAS--->
        <section id="idiomas" class="pt-4">
            <h2 class="fw-bold mb-2">Escolhe um idioma para começar</h2>
            <p class="text-secondary mb-4">Clica num cartão para abrir o quiz desse idioma.</p>

            <div class="d-flex flex-wrap justify-content-center gap-5">
                <a href="quizzes.php" class="lang-card text-decoration-none text-reset">
                    <div class="flag" style="background-image:url('imgs/uk.png');"></div><p>Inglês</p>
                </a>
                <a href="quizzes.php" class="lang-card text-decoration-none text-reset">
                    <div class="flag" style="background-image:url('imgs/fr.png');"></div><p>Francês</p>
                </a>
                <a href="quizzes.php" class="lang-card text-decoration-none text-reset">
                    <div class="flag" style="background-image:url('imgs/es.png');"></div><p>Espanhol</p>
                </a>
                <a href="quizzes.php" class="lang-card text-decoration-none text-reset">
                    <div class="flag" style="background-image:url('imgs/al.png');"></div><p>Alemão</p>
                </a>
            </div>
        </section>

        
        <!---TESTEMUNHOS--->
        <section class="content text-left py-5" id="feedback-area">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold mb-0">O que dizem os utilizadores</h2>
                    
                    <?php if (count($feedbacks) > 0): ?>
                    <div>
                        <button class="btn btn-outline-secondary btn-sm rounded-circle me-1" type="button" data-bs-target="#carouselFeedback" data-bs-slide="prev">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <button class="btn btn-outline-secondary btn-sm rounded-circle" type="button" data-bs-target="#carouselFeedback" data-bs-slide="next">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
                    <?php endif; ?>
                </div>

                <div id="carouselFeedback" class="carousel slide carousel-dark" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        
                        <?php if (count($feedbacks) > 0): ?>
                            <?php 
                            $chunks = array_chunk($feedbacks, 3); 
                            
                            foreach($chunks as $index => $grupo): 
                                $activeClass = ($index === 0) ? 'active' : '';
                            ?>
                            
                            <div class="carousel-item <?php echo $activeClass; ?>" data-bs-interval="5000">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    
                                    <?php foreach($grupo as $f): ?>
                                        <div class="col">
                                            <div class="card h-100 p-4 shadow-sm border-0 bg-light">
                                                <div class="mb-3 text-warning">
                                                    <?php 
                                                    $estrelas = isset($f['classificacao']) ? (int)$f['classificacao'] : 5;
                                                    
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        if ($i <= $estrelas) {
                                                            echo '<i class="bi bi-star-fill"></i> ';
                                                        } else {
                                                            echo '<i class="bi bi-star text-secondary"></i> ';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <p class="text-secondary mb-3 fst-italic">
                                                    "<?php echo htmlspecialchars($f['mensagem']); ?>"
                                                </p>
                                                <h6 class="fw-bold mb-0 text">
                                                    - <?php echo htmlspecialchars($f['nome']); ?>
                                                </h6>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                            <?php endforeach; ?>

                        <?php else: ?>
                            <div class="text-center py-5 text-muted">
                                <i class="bi bi-chat-square-dots fs-1 mb-3"></i>
                                <p>Ainda não há opiniões. Sê o primeiro a comentar!</p>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                
                <div class="mt-5 pt-5 border-top text-center">
                    <h3 class="fw-bold mb-4">Adicione o seu Feedback</h3>
                    <form id="feedback-form" method="POST" action="processar_feedback.php"> 
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-8">
                                
                                <div class="mb-3 text-start">
                                    <label class="form-label fw-semibold">Nome</label>
                                    <input type="text" class="form-control bg-light" name="nome" placeholder="Ex: Maria S." required>
                                </div>

                                <div class="mb-3 text-start">
                                    <label class="form-label fw-semibold">Classificação</label>
                                    <div class="rating">
                                        <input type="radio" name="classificacao" id="star5" value="5"><label for="star5"><i class="bi bi-star-fill"></i></label>
                                        <input type="radio" name="classificacao" id="star4" value="4"><label for="star4"><i class="bi bi-star-fill"></i></label>
                                        <input type="radio" name="classificacao" id="star3" value="3"><label for="star3"><i class="bi bi-star-fill"></i></label>
                                        <input type="radio" name="classificacao" id="star2" value="2"><label for="star2"><i class="bi bi-star-fill"></i></label>
                                        <input type="radio" name="classificacao" id="star1" value="1"><label for="star1"><i class="bi bi-star-fill"></i></label>
                                    </div>
                                </div>

                                <div class="mb-3 text-start">
                                    <label class="form-label fw-semibold">Mensagem</label>
                                    <textarea class="form-control bg-light" name="mensagem" rows="3" placeholder="O que achaste da plataforma?" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary px-5 rounded-pill">Enviar Feedback</button>
                            </div>
                        </div>
                    </form>
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