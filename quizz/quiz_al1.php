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
      <h1 class="fs-4 mb-2">QUIZZ 1 – Alemão (A1)</h1>
      <p class="lead mb-3">Responde às 5 questões. No fim, clica em <strong>Verificar</strong> para veres a pontuação.</p>

      <form id="quiz" novalidate>
        <fieldset data-q="1" data-correct="a">
          <div class="q-title">1) “Guten Morgen” significa:</div>
          <div class="vstack gap-1 mt-1">
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q1" value="a">a) Bom dia</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q1" value="b">b) Boa noite</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q1" value="c">c) Boa tarde</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q1" value="d">d) Adeus</label>
          </div>
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="2" data-correct="b">
          <div class="q-title mt-3">2) Completar a frase: <em>Ich ___ Maria.</em></div>
          <div class="vstack gap-1 mt-1">
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q2" value="a">a) ist</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q2" value="b">b) bin</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q2" value="c">c) bist</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q2" value="d">d) seid</label>
          </div>
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="3" data-answer-text="wie geht es dir?">
          <div class="q-title mt-3">3) Traduzir para alemão: <em>“Como estás?”</em></div>
          <input type="text" name="q3" class="form-control mt-1" placeholder="Escreve aqui a tradução">
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="4" data-correct="a">
          <div class="q-title mt-3">4) “Danke schön” quer dizer:</div>
          <div class="vstack gap-1 mt-1">
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q4" value="a">a) Muito obrigado</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q4" value="b">b) Por favor</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q4" value="c">c) De nada</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q4" value="d">d) Até logo</label>
          </div>
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="5" data-correct="a">
          <div class="q-title mt-3">5) Completar a frase: <em>Er ___ einen Hund.</em></div>
          <div class="vstack gap-1 mt-1">
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q5" value="a">a) hat</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q5" value="b">b) habe</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q5" value="c">c) haben</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q5" value="d">d) bist</label>
          </div>
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <div class="d-flex gap-2 mt-3">
          <button type="submit" class="btn btn-outline-dark">Verificar</button>
          <button type="button" id="limpar" class="btn btn-outline-secondary">Limpar</button>
        </div>

        <div id="result" class="fw-bold mt-2" aria-live="polite"></div>

        <div class="next-quiz" id="nextQuiz" hidden>
          <p class="mb-2 fw-bold">Conseguiste!<br>Pronto para um novo desafio?</p>
          <a href="quiz_al2.php" class="btn btn-outline-dark">Ir para o próximo quizz</a>
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
      const clean = s => s.trim().toLowerCase().replace(/\s+/g,' ');

      const show = (fs, ok, rightText) => {
        const fb = fs.querySelector('.feedback');
        fb.hidden = false;
        fb.textContent = ok ? '✔️ Correto!' : (rightText ? `❌ Resposta certa: ${rightText}` : '❌ Errado.');
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
            const typed = clean(fs.querySelector('input[type="text"]')?.value || '');
            good = typed === txt.toLowerCase();
            show(fs, good, 'Wie geht es dir?');
          }
          if (good) score++;
        });

        result.textContent = `Acertaste ${score} de ${total} perguntas.`;
        next.hidden = false;
      });

      document.getElementById('limpar').addEventListener('click', () => {
        form.reset();
        form.querySelectorAll('.feedback').forEach(fb => {
          fb.hidden = true; fb.textContent = ''; fb.classList.remove('text-success','text-danger');
        });
        result.textContent = '';
        next.hidden = true;
      });
    })();
  </script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>