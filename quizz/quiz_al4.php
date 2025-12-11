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
      <h1 class="fs-4 mb-2">QUIZZ 4 – Alemão (B2)</h1>
      <p class="lead mb-3">Responde às 5 questões. No fim, clica em <strong>Verificar</strong> para veres a pontuação.</p>

      <form id="quiz" novalidate>
        <fieldset data-q="1" data-answer-text="Ela conseguiu resolver o problema.">
          <div class="q-title">1) Traduzir para português: <em>“Sie hat es geschafft, das Problem zu lösen.”</em></div>
          <input type="text" name="q1" class="form-control mt-1" placeholder="Escreve aqui a tradução em português">
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="2" data-correct="a">
          <div class="q-title mt-3">2) Completar a frase: <em>Wenn ich das ___ hätte, hätte ich dir geholfen.</em></div>
          <div class="vstack gap-1 mt-1">
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q2" value="a">a) gewusst</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q2" value="b">b) wissen</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q2" value="c">c) wusste</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q2" value="d">d) weiß</label>
          </div>
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="3" data-correct="a">
          <div class="q-title mt-3">3) Escolher a tradução correta:<br><em>“Sie sollten um acht Uhr ankommen.”</em></div>
          <div class="vstack gap-1 mt-1">
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q3" value="a">a) Era suposto eles chegarem às oito.</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q3" value="b">b) Eles chegaram às oito.</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q3" value="c">c) Eles vão chegar às oito.</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q3" value="d">d) Eles nunca chegam às oito.</label>
          </div>
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="4" data-answer-text="Er hat mit dem Rauchen aufgehört.">
          <div class="q-title mt-3">4) Traduzir para alemão: <em>“Ele desistiu de fumar.”</em></div>
          <input type="text" name="q4" class="form-control mt-1" placeholder="Escreve aqui a tradução em alemão">
          <div class="feedback text-body-tertiary" hidden></div>
        </fieldset>

        <fieldset data-q="5" data-correct="a">
          <div class="q-title mt-3">5) Completar a frase: <em>Als wir ankamen, ___ der Film schon angefangen.</em></div>
          <div class="vstack gap-1 mt-1">
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q5" value="a">a) hatte</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q5" value="b">b) hat</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q5" value="c">c) wird</label>
            <label class="opt d-flex align-items-center gap-2 border rounded-1 p-2"><input type="radio" name="q5" value="d">d) haben</label>
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
          <a href="quiz_al5.php" class="btn btn-outline-dark">Ir para o próximo quizz</a>
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
