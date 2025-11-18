<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polyglot Play</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
  <?php 
    require('../../includes/nav.php');
  ?>

  <main class="quiz container my-3">
    <div class="card p-3 mx-auto" style="max-width:760px;border-color:#ccc">
      <h1 class="fs-4 mb-2">QUIZZ 2 – Alemão (A2)</h1>
      <p class="lead mb-3">Responde às 5 questões. No fim, clica em <strong>Verificar</strong> para veres a pontuação.</p>

      <form id="quiz" novalidate>
        <fieldset data-q="1" data-answer-text="Eu vou à escola.">
          <div class="q-title">1) Traduzir para português: <em>“Ich gehe in die Schule.”</em></div>
          <input type="text" name="q1" class="form-control mt-1" placeholder="Escreve aqui a tradução em português">
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="2" data-correct="c">
          <div class="q-title mt-3">2) Completar a frase: <em>Wir ___ jeden Tag Brot.</em></div>
          <div class="vstack gap-1 mt-1">
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q2" value="a">a) esse</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q2" value="b">b) esst</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q2" value="c">c) essen</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q2" value="d">d) isst</label>
          </div>
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="3" data-correct="a">
          <div class="q-title mt-3">3) “Wie spät ist es?” significa:</div>
          <div class="vstack gap-1 mt-1">
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q3" value="a">a) Que horas são?</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q3" value="b">b) Onde estás?</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q3" value="c">c) Como estás?</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q3" value="d">d) Que dia é hoje?</label>
          </div>
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="4" data-answer-text="Ich mag Musik.">
          <div class="q-title mt-3">4) Traduzir para alemão: <em>“Eu gosto de música.”</em></div>
          <input type="text" name="q4" class="form-control mt-1" placeholder="Escreve aqui a tradução em alemão">
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="5" data-correct="a">
          <div class="q-title mt-3">5) Completar a frase: <em>Sie ___ sehr glücklich heute.</em></div>
          <div class="vstack gap-1 mt-1">
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q5" value="a">a) sind</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q5" value="b">b) bist</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q5" value="c">c) ist</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q5" value="d">d) bin</label>
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
          <a href="quiz_al3.php" class="btn btn-outline-dark">Ir para o próximo quizz</a>
        </div>
      </form>
    </div>
  </main>

  <?php 
    require('../../includes/footer.php');
  ?>

  <script>
    (() => {
      const form = document.getElementById('quiz');
      const result = document.getElementById('result');
      const next = document.getElementById('nextQuiz');
      const clean = s => (s || '').trim().toLowerCase().replace(/\s+/g,' ');

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
            good = typed === clean(txt);
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
          fb.hidden = true; fb.textContent = ''; fb.classList.remove('text-success','text-danger');
        });
        result.textContent = '';
        next.hidden = true;
      });
    })();
  </script>

  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
