<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polyglot Play - Aprende Alemão</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    </head>
<body class="bg-light">
    <?php
        define('PROJECT_ROOT', dirname(dirname(__FILE__))); 
        $BASE_URL = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/') . '/';
        if ($BASE_URL === '//') { $BASE_URL = '/'; }
        require_once(PROJECT_ROOT . '/includes/nav.php');
    ?>

    <main class="container py-5">
        <section class="row align-items-center g-5 mb-5">
            <div class="col-lg-7">
                <h1 class="display-4 fw-bold lh-tight mb-3 text-dark">
                    Aprende Alemão passo a passo</span>
                </h1>
                <p class="lead text-secondary mb-4">
                    Domina o essencial de cada nível. Aprende frases reais para o dia a dia e consolida o conhecimento com os nossos quizzes interativos.
                </p>
            </div>

            <div class="col-lg-5">
                <div class="card border-0 shadow p-4 bg-white rounded-4">
                    <h5 class="fw-bold mb-3"><i class="bi bi-lightbulb-fill text-warning me-2"></i>Porquê começar já?</h5>
                    <ul class="list-unstyled d-grid gap-3 mb-0">
                        <li class="d-flex align-items-start fs-5">
                            <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                            <span>5 a 10 minutos por dia.</span>
                        </li>
                        <li class="d-flex align-items-start fs-5">
                            <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                            <span>Foca-te em <strong>frases reais</strong>.</span>
                        </li>
                        <li class="d-flex align-items-start fs-5">
                            <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                            <span>Memorização rápida.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="levels" class="mb-5">
            <div class="row g-4">
                <div class="col-md-4 col-lg-3">
                    <div class="nav flex-column nav-pills gap-2 sticky-top" style="top: 100px; z-index: 1;" id="level-tabs" role="tablist">
                        <button class="nav-link active rounded-3 shadow-sm text-start p-3 fs-5" id="basic-tab" data-bs-toggle="pill" data-bs-target="#basic" type="button" role="tab">
                            🟢 Nível Básico (A1/A2)
                        </button>
                        <button class="nav-link rounded-3 shadow-sm text-start p-3 fs-5" id="intermediate-tab" data-bs-toggle="pill" data-bs-target="#intermediate" type="button" role="tab">
                            🟡 Nível Intermédio (B1/B2)
                        </button>
                        <button class="nav-link rounded-3 shadow-sm text-start p-3 fs-5" id="advanced-tab" data-bs-toggle="pill" data-bs-target="#advanced" type="button" role="tab">
                            🔴 Nível Avançado (C1)
                        </button>
                    </div>
                </div>

                <div class="col-md-8 col-lg-9">
                    <div class="tab-content" id="level-tabsContent">

                        <div class="tab-pane fade show active" id="basic" role="tabpanel">
                            <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white">
                                <div class="border-bottom pb-3 mb-4">
                                    <h2 class="h3 fw-bold text-dark">Começar do Zero</h2>
                                    <p class="text-secondary mb-0 fs-5">Objetivo: Perceber e usar frases simples, cumprimentos e apresentações.</p>
                                </div>

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="p-4 bg-light rounded-4 h-100 border">
                                            <h3 class="h5 fw-bold text-dark mb-4"><i class="bi bi-chat-dots me-2 text-dark"></i>Cumprimentos</h3>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Hallo!</span> <br> <span class="text-secondary">Olá!</span></li>
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Guten Morgen!</span> <br> <span class="text-secondary">Bom dia!</span></li>
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Gute Nacht!</span> <br> <span class="text-secondary">Boa noite!</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-4 bg-light rounded-4 h-100 border">
                                            <h3 class="h5 fw-bold text-dark mb-4"><i class="bi bi-person-badge me-2 text-dark"></i>Apresentações</h3>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Ich heiße João.</span> <br> <span class="text-secondary">Chamo-me João.</span></li>
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Ich komme aus Portugal.</span> <br> <span class="text-secondary">Venho de Portugal.</span></li>
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Freut mich.</span> <br> <span class="text-secondary">Prazer em conhecer-te.</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <p class="fw-bold mb-2 fs-5">Vocabulário essencial:</p>
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge bg-success-subtle text-success-emphasis fs-6 fw-normal px-3 py-2 border border-success-subtle">Zahlen (números)</span>
                                        <span class="badge bg-success-subtle text-success-emphasis fs-6 fw-normal px-3 py-2 border border-success-subtle">Wochentage (dias)</span>
                                        <span class="badge bg-success-subtle text-success-emphasis fs-6 fw-normal px-3 py-2 border border-success-subtle">Essen (comida)</span>
                                        <span class="badge bg-success-subtle text-success-emphasis fs-6 fw-normal px-3 py-2 border border-success-subtle">Familie (família)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="intermediate" role="tabpanel">
                            <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white">
                                <div class="border-bottom pb-3 mb-4">
                                    <h2 class="h3 fw-bold text-dark">Ganhar Confiança</h2>
                                    <p class="text-secondary mb-0 fs-5">Objetivo: Manter conversas, falar da rotina e fazer perguntas.</p>
                                </div>

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="p-4 bg-light rounded-4 h-100 border">
                                            <h3 class="h5 fw-bold text-dark mb-4"><i class="bi bi-clock-history me-2 text-dark"></i>Rotina Diária</h3>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Ich wache um 7 Uhr auf.</span> <br> <span class="text-secondary">Acordo às 7h.</span></li>
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Ich fahre mit dem Bus.</span> <br> <span class="text-secondary">Vou de autocarro.</span></li>
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Ich lerne jeden Tag.</span> <br> <span class="text-secondary">Estudo todos os dias.</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-4 bg-light rounded-4 h-100 border">
                                            <h3 class="h5 fw-bold text-dark mb-4"><i class="bi bi-question-circle me-2 text-dark"></i>Perguntas</h3>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Was machst du?</span> <br> <span class="text-secondary">O que fazes?</span></li>
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Wo wohnst du?</span> <br> <span class="text-secondary">Onde vives?</span></li>
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Wie war dein Tag?</span> <br> <span class="text-secondary">Como foi o teu dia?</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <p class="fw-bold mb-2 fs-5">Gramática para rever:</p>
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge bg-warning-subtle text-warning-emphasis fs-6 fw-normal px-3 py-2 border border-warning-subtle">Präsens</span>
                                        <span class="badge bg-warning-subtle text-warning-emphasis fs-6 fw-normal px-3 py-2 border border-warning-subtle">Präteritum / Perfekt</span>
                                        <span class="badge bg-warning-subtle text-warning-emphasis fs-6 fw-normal px-3 py-2 border border-warning-subtle">Es gibt (há)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="advanced" role="tabpanel">
                            <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white">
                                <div class="border-bottom pb-3 mb-4">
                                    <h2 class="h3 fw-bold text-dark">Fluidez e Naturalidade</h2>
                                    <p class="text-secondary mb-0 fs-5">Objetivo: Usar expressões, conectores e expressar opiniões complexas.</p>
                                </div>

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="p-4 bg-light rounded-4 h-100 border">
                                            <h3 class="h5 fw-bold text-dark mb-4"><i class="bi bi-stars me-2 text-dark"></i>Expressões Úteis</h3>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Um ehrlich zu sein...</span> <br> <span class="text-secondary">Para ser sincero...</span></li>
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Es kommt darauf an.</span> <br> <span class="text-secondary">Depende.</span></li>
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Ich freue mich darauf.</span> <br> <span class="text-secondary">Estou ansioso por isso.</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-4 bg-light rounded-4 h-100 border">
                                            <h3 class="h5 fw-bold text-dark mb-4"><i class="bi bi-link-45deg me-2 text-dark"></i>Conectores</h3>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Allerdings,</span> <br> <span class="text-secondary">No entanto,</span></li>
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Auf der anderen Seite,</span> <br> <span class="text-secondary">Por outro lado,</span></li>
                                                <li class="mb-3 fs-5"><span class="fw-bold text-primary">Meiner Meinung nach,</span> <br> <span class="text-secondary">Na minha opinião,</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <p class="fw-bold mb-2 fs-5">Praticar mais:</p>
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge bg-danger-subtle text-danger-emphasis fs-6 fw-normal px-3 py-2 border border-danger-subtle">Listening (Séries)</span>
                                        <span class="badge bg-danger-subtle text-danger-emphasis fs-6 fw-normal px-3 py-2 border border-danger-subtle">Writing (Ensaios)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="tips" class="mb-5">
            <h2 class="h4 fw-bold mb-4 text-center">Dicas rápidas para aprender melhor</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 text-center p-4 bg-white rounded-4">
                        <div class="mb-3">
                            <i class="bi bi-calendar-check text-primary" style="font-size: 2.5rem;"></i>
                        </div>
                        <h3 class="h5 fw-bold">Metas Diárias</h3>
                        <p class="text-muted fs-6">Estuda 5 a 10 minutos por dia. A consistência bate a intensidade.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 text-center p-4 bg-white rounded-4">
                        <div class="mb-3">
                            <i class="bi bi-chat-quote text-success" style="font-size: 2.5rem;"></i>
                        </div>
                        <h3 class="h5 fw-bold">Frases > Palavras</h3>
                        <p class="text-muted fs-6">Decora "Ich fahre mit dem Bus" em vez de palavras soltas.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 text-center p-4 bg-white rounded-4">
                        <div class="mb-3">
                            <i class="bi bi-mic text-danger" style="font-size: 2.5rem;"></i>
                        </div>
                        <h3 class="h5 fw-bold">Voz Alta</h3>
                        <p class="text-muted fs-6">Lê tudo em voz alta. A tua pronúncia e confiança vão agradecer.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="text-center py-5">
            <div class="card border-0 bg-primary text-white p-5 rounded-4 mx-auto shadow" style="max-width: 800px;">
                <h2 class="h3 fw-bold mb-3">Sentes-te preparado?</h2>
                <p class="lead mb-4 opacity-75">
                    Agora que já reviste a matéria, está na hora de testar os teus conhecimentos.
                </p>
                <div>
                    <a href="../quizzes.php" class="btn btn-light btn-lg rounded-pill px-5 fw-bold text-dark shadow-sm">
                        Ir para os Quizzes
                    </a>
                </div>
            </div>
        </section>

    </main>

    <?php require('../includes/footer.php'); ?>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>