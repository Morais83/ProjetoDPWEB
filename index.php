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
    <header class="bg-white border-bottom border-secondary-subtle">
        <div class="container-fluid d-flex align-items-center justify-content-between gap-2 flex-wrap py-2 px-3">
            <a href="index.php" class="d-flex align-items-center text-decoration-none text-body gap-2">
                <img src="imgs/logo.png" alt="Logo Polyglot Play" class="logo-img">
                <h1 class="brand-title fw-bold">Polyglot Play</h1>
            </a>

            <a href="login.php" class="btn btn-primary rounded-3 px-3">Login</a>
        </div>
    </header>

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
                    <a href="#idiomas" class="btn btn-primary btn-lg rounded-3 px-3">Começar agora</a>
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
                <div class="bg-warning rounded-pill px-4 py-3 shadow-pill">
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
                            <p class="mb-0 text-secondary">Abre um dos idiomas acima e começa com perguntas simples.</p>
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
            <a href="quizz/uk/quiz_uk1.php" class="lang-card text-decoration-none text-reset">
                <div class="flag" style="background-image:url('imgs/uk.png');"></div><p>Inglês</p>
            </a>
            <a href="quizz/fr/quiz_fr1.php" class="lang-card text-decoration-none text-reset">
                <div class="flag" style="background-image:url('imgs/fr.png');"></div><p>Francês</p>
            </a>
            <a href="quizz/es/quiz_es1.php" class="lang-card text-decoration-none text-reset">
                <div class="flag" style="background-image:url('imgs/es.png');"></div><p>Espanhol</p>
            </a>
            <a href="quizz/al/quiz_al1.php" class="lang-card text-decoration-none text-reset">
                <div class="flag" style="background-image:url('imgs/al.png');"></div><p>Alemão</p>
            </a>
            </div>
        </section>

        <!---TESTEMUNHOS--->
        <section class="content text-left py-5">
            <div class="container">
                <h2 class="fw-bold mb-4">O que dizem os utilizadores</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 p-3">
                            <h6 class="fw-bold mb-1">Ana M.</h6>
                            <p class="text-secondary mb-0"><i class="bi bi-quote me-1"></i>Aprender inglês nunca foi tão divertido!</p>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100 p-3">
                            <h6 class="fw-bold mb-1">João P.</h6>
                            <p class="text-secondary mb-0"><i class="bi bi-quote me-1"></i>Adoro os quizzes curtos, ajudam-me a praticar todos os dias.</p>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100 p-3">
                            <h6 class="fw-bold mb-1">Carla F.</h6>
                            <p class="text-secondary mb-0"><i class="bi bi-quote me-1"></i>Ganhei consistência com sessões de 5 minutos. Recomendo!</p>
                        </div>
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