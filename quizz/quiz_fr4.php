<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polyglot Play</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php 
    require('../includes/nav.php');
  ?>

  <main class="quiz container my-3">
    <div class="card p-3 mx-auto" style="max-width:760px;border-color:#ccc">
      <h1 class="fs-4 mb-2">QUIZZ 4 – Francês (B2)</h1>
      <p class="lead mb-3">Responde às 5 questões. No fim, clica em <strong>Verificar</strong> para veres a pontuação.</p>

      <form id="quiz" novalidate>

        <fieldset data-q="1" data-answer-text="Ela conseguiu resolver o problema.">
          <div class="q-title">1) Traduzir para português:<br><em>“Elle a réussi à résoudre le problème.”</em></div>
          <input type="text" name="q1" class="form-control mt-1" placeholder="Escreve aqui a tradução em português">
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="2" data-correct="a">
          <div class="q-title mt-3">2) Completar a frase: <em>Si j’___ su, je t’aurais aidé.</em></div>
          <div class="vstack gap-1 mt-1">
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
              <input type="radio" name="q2" value="a"> a) avais
            </label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
              <input type="radio" name="q2" value="b"> b) ai
            </label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
              <input type="radio" name="q2" value="c"> c) avait
            </label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
              <input type="radio" name="q2" value="d"> d) sais
            </label>
          </div>
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="3" data-correct="a">
          <div class="q-title mt-3">3) Escolher a tradução correta:<br><em>“Ils devaient arriver à huit heures.”</em></div>
          <div class="vstack gap-1 mt-1">
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
              <input type="radio" name="q3" value="a"> a) Era suposto eles chegarem às oito.
            </label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
              <input type="radio" name="q3" value="b"> b) Eles chegaram às oito.
            </label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
              <input type="radio" name="q3" value="c"> c) Eles vão chegar às oito.
            </label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
              <input type="radio" name="q3" value="d"> d) Eles nunca chegam às oito.
            </label>
          </div>
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="4" data-answer-text="Il a arrêté de fumer.">
          <div class="q-title mt-3">4) Traduzir para francês:<br><em>“Ele desistiu de fumar.”</em></div>
          <input type="text" name="q4" class="form-control mt-1" placeholder="Escreve aqui a tradução em francês">
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="5" data-correct="b">
          <div class="q-title mt-3">5) Completar a frase: <em>Quand nous sommes arrivés, le film ___.</em></div>
          <div class="vstack gap-1 mt-1">
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
              <input type="radio" name="q5" value="a"> a) commence
            </label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
              <input type="radio" name="q5" value="b"> b) avait commencé
            </label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
              <input type="radio" name="q5" value="c"> c) a commencé
            </label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2">
              <input type="radio" name="q5" value="d"> d) commencera
            </label>
          </div>
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <div class="d-flex gap-2 mt-3">
          <button type="submit" class="btn btn-outline-dark">Verificar</button>
          <button type="button" id="limpar" class="btn btn-outline-secondary">Limpar</button>
        </div>

        <div id="result" class="fw-bold mt-2" aria-live="polite"></div>

        <div class="next-quiz" id="nextQuiz" hidden>
          <p class="mb-2 fw-bold">Parabéns! Terminaste o nível B2.</p>
          <a href="quiz_fr5.php" class="btn btn-outline-dark">Voltar à página de francês</a>
        </div>

      </form>
    </div>
  </main>

  <?php 
    require('../includes/footer.php');
  ?>

  <script>
    (() => {
      const form = document.getElementById('quiz');
      const result = document.getElementById('result');
      const next = document.getElementById('nextQuiz');

      const normalize = s => (s || '')
        .toLowerCase().trim()
        .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
        .replace(/[?!.,;:()\/\[\]{}"’‘«»]+/g, ' ')
        .replace(/\s+/g, ' ');

      const show = (fs, ok, rightText) => {
        const fb = fs.querySelector('.feedback');
        fb.hidden = false;
        fb.textContent = ok
          ? '✔️ Correto!'
          : (rightText ? `❌ Resposta certa: ${rightText}` : '❌ Errado.');
        fb.classList.toggle('text-success', ok);
        fb.classList.toggle('text-danger', !ok);
      };

      form.addEventListener('submit', e => {
        e.preventDefault();
        let score = 0, total = 0;

        form.querySelectorAll('fieldset').forEach(fs => {
          total++;
          const ok = fs.dataset.correct;
          const txt = fs.dataset.answerText;
          let good = false;

          if (ok) {
            good = fs.querySelector('input:checked')?.value === ok;
            show(fs, good);
          } else if (txt) {
            const typed = normalize(fs.querySelector('input[type="text"]')?.value);
            good = normalize(txt) === typed;
            show(fs, good, txt);
          }
          if (good) score++;
        });

        result.textContent = `Acertaste ${score} de ${total} perguntas.`;
        next.hidden = false;
      });

      document.getElementById('limpar').addEventListener('click', () => {
        form.reset();
        form.querySelectorAll('.feedback').forEach(fb => {
          fb.hidden = true;
          fb.textContent = '';
          fb.classList.remove('text-success', 'text-danger');
        });
        result.textContent = '';
        next.hidden = true;
      });
    })();
  </script>

  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
