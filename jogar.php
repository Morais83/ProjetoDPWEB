<?php
    require_once('includes/connection.php');

    $idioma = $_GET['idioma'] ?? 'en';
    $nivel  = $_GET['nivel'] ?? 'A1';

    $nomes_idiomas = [
        'en' => 'Inglês',
        'fr' => 'Francês',
        'es' => 'Espanhol',
        'al' => 'Alemão'
    ];
    $nome_idioma = $nomes_idiomas[$idioma] ?? 'Idioma';

    $sql = "SELECT * FROM perguntas_quiz WHERE idioma = :idioma AND nivel = :nivel ORDER BY RAND() LIMIT 5";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['idioma' => $idioma, 'nivel' => $nivel]);
    $perguntas = $stmt->fetchAll();

    $niveis_ordem = ['A1', 'A2', 'B1', 'B2', 'C1'];
    $indice_atual = array_search($nivel, $niveis_ordem);
    $proximo_link = "quizzes.php"; 
    $btn_texto = "Escolher outra língua";

    if ($indice_atual !== false && $indice_atual < 4) {
        $proximo_nivel = $niveis_ordem[$indice_atual + 1];
        $proximo_link = "jogar.php?idioma=$idioma&nivel=$proximo_nivel";
        $btn_texto = "Ir para o nível $proximo_nivel";
    }
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polyglot Play - Quiz</title>
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

    <main class="quiz container my-3">
        <div class="card p-3 mx-auto shadow-sm" style="max-width:760px; border-color:#ccc">
            
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h1 class="fs-4 mb-0">QUIZ – <?php echo $nome_idioma; ?> (<?php echo $nivel; ?>)</h1>
                <a href="quizzes.php" class="btn btn-sm btn-outline-secondary">Sair</a>
            </div>
            
            <p class="lead mb-4 small text-secondary">Responde às questões abaixo. Boa sorte!</p>

            <?php if (count($perguntas) > 0): ?>
                
                <form id="quiz" novalidate>
                    <?php foreach($perguntas as $index => $p): ?>
                        <fieldset class="mb-4" data-correct="<?php echo $p['resposta_correta']; ?>">
                            <div class="q-title fw-bold mb-2">
                                <?php echo ($index + 1) . ') ' . htmlspecialchars($p['pergunta']); ?>
                            </div>
                            
                            <div class="vstack gap-2 mt-1">
                                <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2 cursor-pointer">
                                    <input type="radio" name="q<?php echo $p['id']; ?>" value="a">
                                    <span>a) <?php echo htmlspecialchars($p['opcao_a']); ?></span>
                                </label>

                                <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2 cursor-pointer">
                                    <input type="radio" name="q<?php echo $p['id']; ?>" value="b">
                                    <span>b) <?php echo htmlspecialchars($p['opcao_b']); ?></span>
                                </label>

                                <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2 cursor-pointer">
                                    <input type="radio" name="q<?php echo $p['id']; ?>" value="c">
                                    <span>c) <?php echo htmlspecialchars($p['opcao_c']); ?></span>
                                </label>

                                <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2 cursor-pointer">
                                    <input type="radio" name="q<?php echo $p['id']; ?>" value="d">
                                    <span>d) <?php echo htmlspecialchars($p['opcao_d']); ?></span>
                                </label>
                            </div>
                            <div class="feedback fw-bold mt-2" hidden></div>
                        </fieldset>
                    <?php endforeach; ?>

                    <div class="d-flex gap-2 mt-3 border-top pt-3">
                        <button type="submit" class="btn btn-primary px-4">Verificar Respostas</button>
                        <button type="button" id="limpar" class="btn btn-outline-secondary">Limpar</button>
                    </div>

                    <div id="result" class="fw-bold mt-3 fs-5" aria-live="polite"></div>

                    <div class="next-quiz mt-3 p-3 bg-light rounded border" id="nextQuiz" hidden>
                        <p class="mb-2 fw-bold text-success">Parabéns! Completaste este quiz.</p>
                        <a href="<?php echo $proximo_link; ?>" class="btn btn-success">
                            <?php echo $btn_texto; ?> <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </form>

            <?php else: ?>
                <div class="alert alert-warning text-center">
                    <i class="bi bi-exclamation-triangle fs-1"></i><br>
                    Ainda não há perguntas suficientes para este nível na base de dados.<br>
                    <a href="quizzes.php" class="btn btn-dark mt-3">Voltar</a>
                </div>
            <?php endif; ?>

        </div>
    </main>

    <?php require('includes/footer.php'); ?>

    <script>
        (() => {
            const form = document.getElementById('quiz');
            if(!form) return; 

            const result = document.getElementById('result');
            const next = document.getElementById('nextQuiz');

            const show = (fs, ok) => {
                const fb = fs.querySelector('.feedback');
                fb.hidden = false;
                fb.textContent = ok ? '✔️ Correto!' : '❌ Incorreto.';
                fb.className = 'feedback mt-2 fw-bold ' + (ok ? 'text-success' : 'text-danger');
                
                const selectedInput = fs.querySelector('input:checked');
                if(selectedInput) {
                    const parent = selectedInput.closest('.opt');
                    parent.classList.remove('border'); 
                    parent.classList.add(ok ? 'border-success' : 'border-danger', 'border-2');
                }
            };

            form.addEventListener('submit', e => {
                e.preventDefault();
                let score = 0;
                let total = 0;
                let allAnswered = true;

                form.querySelectorAll('fieldset').forEach(fs => {
                    total++;
                    const correctVal = fs.dataset.correct;
                    const selected = fs.querySelector('input:checked');

                    
                    let isCorrect = false;
                    if (selected && selected.value === correctVal) {
                        isCorrect = true;
                        score++;
                    }
                    
                    show(fs, isCorrect);
                });

                result.textContent = `Acertaste ${score} de ${total} perguntas.`;
                
                next.hidden = false; 
                next.scrollIntoView({behavior: "smooth"});
            });

            document.getElementById('limpar').addEventListener('click', () => {
                form.reset();
                form.querySelectorAll('.feedback').forEach(fb => fb.hidden = true);
                form.querySelectorAll('.opt').forEach(opt => {
                    opt.classList.remove('border-success', 'border-danger', 'border-2');
                    opt.classList.add('border');
                });
                result.textContent = '';
                next.hidden = true;
            });
        })();
    </script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>