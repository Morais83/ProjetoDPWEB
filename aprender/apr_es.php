<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polyglot Play - Aprende Espanhol</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
        require('../includes/nav.php');
    ?>

    <main class="container py-5">
        <section class="row align-items-center g-4 mb-5">
            <div class="col-lg-7">
                <h1 class="display-5 fw-bold lh-tight mb-3">
                    Aprende Espanhol passo a passo:
                    básico, intermédio e avançado.
                </h1>
                <p class="text-secondary mb-4">
                    Vê o essencial de cada nível, aprende frases úteis para o dia a dia
                    e depois pratica tudo nos quizzes do Polyglot Play.
                </p>
            </div>

            <div class="col-lg-5">
                <div class="learning-highlight p-4 p-md-5 h-100 d-flex flex-column justify-content-center">
                    <p class="fw-semibold mb-2 text-uppercase small text-muted">
                        Porque começar já?
                    </p>
                    <p><i class="bi bi-dot text-dark"></i>5 a 10 minutos por dia já fazem diferença.</p>
                    <p><i class="bi bi-dot text-dark"></i>Foca-te em frases reais, não só listas de palavras.</p>
                    <p><i class="bi bi-dot text-dark"></i>Repetição + quizzes = memorização mais rápida.</p>
                    <p class="mb-0 small text-muted">
                        Usa esta página como referência rápida
                        e volta sempre que precisares de rever.
                    </p>
                </div>
            </div>
        </section>

        <section id="levels" class="content mb-5">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="nav flex-column nav-pills gap-2 level-nav" id="level-tabs" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="basic-tab" data-bs-toggle="pill" data-bs-target="#basic" type="button" role="tab" aria-controls="basic" aria-selected="true">
                            🟢 Nível Básico
                        </button>
                        <button class="nav-link" id="intermediate-tab" data-bs-toggle="pill" data-bs-target="#intermediate" type="button" role="tab" aria-controls="intermediate" aria-selected="false">
                            🟡 Nível Intermédio
                        </button>
                        <button class="nav-link" id="advanced-tab" data-bs-toggle="pill" data-bs-target="#advanced" type="button" role="tab" aria-controls="advanced" aria-selected="false">
                            🔴 Nível Avançado
                        </button>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="tab-content" id="level-tabsContent">

                        <!-- NÍVEL BÁSICO -->
                        <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab" tabindex="0">
                            <div class="card border-0 p-4 mb-3">
                                <h2 class="h4 fw-bold mb-3">Nível Básico – Começar do zero</h2>
                                <p class="text-secondary mb-3">
                                    Aqui o objetivo é perceber e usar frases simples do dia a dia.
                                    Foca-te em cumprimentos, apresentações e vocabulário essencial.
                                </p>

                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <h3 class="h6 text-uppercase text-muted mb-2">Cumprimentos</h3>
                                        <ul class="list-unstyled small mb-0">
                                            <li><span class="phrase-example">¡Hola!</span> – Olá!</li>
                                            <li><span class="phrase-example">¡Buenos días!</span> – Bom dia!</li>
                                            <li><span class="phrase-example">¡Buenas noches!</span> – Boa noite!</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3 class="h6 text-uppercase text-muted mb-2">Apresentações</h3>
                                        <ul class="list-unstyled small mb-0">
                                            <li><span class="phrase-example">Me llamo João.</span> – Chamo-me João.</li>
                                            <li><span class="phrase-example">Soy de Portugal.</span> – Sou de Portugal.</li>
                                            <li><span class="phrase-example">Encantado / Encantada.</span> – Prazer em conhecer-te.</li>
                                        </ul>
                                    </div>
                                </div>

                                <hr class="my-3">

                                <p class="small mb-1 fw-semibold">Vocabulário essencial:</p>
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <span class="badge text-bg-light">los números · números</span>
                                    <span class="badge text-bg-light">los días de la semana · dias da semana</span>
                                    <span class="badge text-bg-light">la comida · comida</span>
                                    <span class="badge text-bg-light">la familia · família</span>
                                </div>

                                <p class="small text-muted mb-0">
                                    Dica: começa por repetir as frases em voz alta e depois tenta
                                    dizê-las sem olhar para o ecrã.
                                </p>
                            </div>
                        </div>

                        <!-- NÍVEL INTERMÉDIO -->
                        <div class="tab-pane fade" id="intermediate" role="tabpanel" aria-labelledby="intermediate-tab" tabindex="0">
                            <div class="card border-0 p-4 mb-3">
                                <h2 class="h4 fw-bold mb-3">Nível Intermédio – Ganhar confiança</h2>
                                <p class="text-secondary mb-3">
                                    Aqui já consegues manter conversas simples, falar sobre a tua rotina
                                    e fazer perguntas mais completas.
                                </p>

                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <h3 class="h6 text-uppercase text-muted mb-2">Falar da rotina</h3>
                                        <ul class="list-unstyled small mb-0">
                                            <li><span class="phrase-example">Me despierto a las 7.</span> – Acordo às 7h.</li>
                                            <li><span class="phrase-example">Voy al trabajo en autobús.</span> – Vou para o trabalho de autocarro.</li>
                                            <li><span class="phrase-example">Estudio español todos los días.</span> – Estudo Espanhol todos os dias.</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3 class="h6 text-uppercase text-muted mb-2">Fazer perguntas</h3>
                                        <ul class="list-unstyled small mb-0">
                                            <li><span class="phrase-example">¿A qué te dedicas?</span> – O que fazes (profissão)?</li>
                                            <li><span class="phrase-example">¿Dónde vives?</span> – Onde vives?</li>
                                            <li><span class="phrase-example">¿Cómo fue tu día?</span> – Como foi o teu dia?</li>
                                        </ul>
                                    </div>
                                </div>

                                <hr class="my-3">

                                <p class="small mb-1 fw-semibold">Gramática que deves rever:</p>
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <span class="badge text-bg-light">Presente de indicativo</span>
                                    <span class="badge text-bg-light">Pretérito perfecto / indefinido</span>
                                    <span class="badge text-bg-light">Hay / No hay</span>
                                    <span class="badge text-bg-light">Artigos definidos e indefinidos</span>
                                </div>

                                <p class="small text-muted mb-0">
                                    Dica: tenta escrever um pequeno parágrafo sobre o teu dia
                                    usando estas estruturas, e depois pratica nos quizzes.
                                </p>
                            </div>
                        </div>

                        <!-- NÍVEL AVANÇADO -->
                        <div class="tab-pane fade" id="advanced" role="tabpanel" aria-labelledby="advanced-tab" tabindex="0">
                            <div class="card border-0 p-4 mb-3">
                                <h2 class="h4 fw-bold mb-3">Nível Avançado – Soar mais natural</h2>
                                <p class="text-secondary mb-3">
                                    Neste nível o objetivo é deixar o espanhol mais fluido e natural,
                                    com expressões, conectores e frases mais complexas.
                                </p>

                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <h3 class="h6 text-uppercase text-muted mb-2">Expressões úteis</h3>
                                        <ul class="list-unstyled small mb-0">
                                            <li><span class="phrase-example">Para ser sincero...</span> – Para ser sincero...</li>
                                            <li><span class="phrase-example">Depende.</span> – Depende.</li>
                                            <li><span class="phrase-example">Tengo muchas ganas.</span> – Estou ansioso por isso.</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3 class="h6 text-uppercase text-muted mb-2">Ligar ideias</h3>
                                        <ul class="list-unstyled small mb-0">
                                            <li><span class="phrase-example">Sin embargo,</span> – No entanto,</li>
                                            <li><span class="phrase-example">Por otro lado,</span> – Por outro lado,</li>
                                            <li><span class="phrase-example">En mi opinión,</span> – Na minha opinião,</li>
                                        </ul>
                                    </div>
                                </div>

                                <hr class="my-3">

                                <p class="small mb-1 fw-semibold">O que deves praticar mais:</p>
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <span class="badge text-bg-light">Listening com séries / vídeos em espanhol</span>
                                    <span class="badge text-bg-light">Writing de pequenos textos</span>
                                    <span class="badge text-bg-light">Vocabulário de temas específicos</span>
                                </div>

                                <p class="small text-muted mb-0">
                                    Dica: tenta explicar uma opinião tua em espanhol (sobre um filme, jogo,
                                    escola, etc.) usando conectores como <em>sin embargo</em>, <em>porque</em>,
                                    <em>aunque</em>.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="tips" class="content mb-5">
            <h2 class="h4 fw-bold mb-3">Dicas rápidas para aprender sem ser chato</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card p-3 h-100">
                        <h3 class="h6 fw-bold mb-2">1. Pequenas metas diárias</h3>
                        <p class="small text-secondary mb-0">
                            Estuda 5 a 10 minutos por dia. Faz um quiz, revê 5 frases,
                            ou aprende 3 novas palavras. O importante é a consistência.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 h-100">
                        <h3 class="h6 fw-bold mb-2">2. Usa frases, não só palavras</h3>
                        <p class="small text-secondary mb-0">
                            Em vez de decorar só um verbo, decora a frase:
                            <span class="phrase-example">Voy a la escuela en autobús.</span>
                            Vais lembrar melhor o significado e a estrutura.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 h-100">
                        <h3 class="h6 fw-bold mb-2">3. Repete em voz alta</h3>
                        <p class="small text-secondary mb-0">
                            Lê as frases em voz alta como se estivesses a falar com alguém.
                            A pronúncia e a confiança melhoram muito mais rápido assim.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="text-center mb-4">
            <div class="card border-0 p-4 p-md-5 mx-auto" style="max-width: 720px;">
                <h2 class="h4 fw-bold mb-2">Pronto para praticar?</h2>
                <p class="text-secondary mb-3">
                    Agora que já tens uma visão geral dos níveis, é hora de pôr em prática
                    com os quizzes de Espanhol do Polyglot Play.
                </p>
                <a href="../quizz/es/quiz_es1.php" class="btn btn-primary btn-lg rounded-3 px-4">
                    Ir para os quizzes de Espanhol
                </a>
            </div>
        </section>
    </main>

    <?php 
        require('../includes/footer.php');
    ?>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
