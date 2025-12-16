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
        define('PROJECT_ROOT', dirname(__FILE__)); 
        $BASE_URL = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
        if ($BASE_URL === '//') {
            $BASE_URL = '/'; 
        }
        $hideLoginButton = true;
        require_once(PROJECT_ROOT . '/includes/nav.php');
    ?>

  <main class="center-area py-4">
    <div class="container">
      <div class="auth-box mx-auto text-center">
        <h1 class="fw-bold mb-4 lh-sm">Crie a sua conta<br>e comece a aprender<br>de forma divertida!</h1>

        <form action="processa_registo.php" method="post">
          <div class="mb-3 text-start">
            <label for="utilizador" class="form-label fw-semibold">Nome de usuário:</label>
            <input type="text" id="utilizador" name="utilizador"
                   class="form-control border-2 rounded-3"
                   placeholder="Ex: joaomorais" required>
          </div>

          <div class="mb-3 text-start">
            <label for="email" class="form-label fw-semibold">E-mail:</label>
            <input type="email" id="email" name="email"
                   class="form-control border-2 rounded-3"
                   placeholder="utilizador@gmail.com" required>
          </div>

          <div class="mb-3 text-start">
            <label for="password" class="form-label fw-semibold">Senha:</label>
            <input type="password" id="password" name="password"
                   class="form-control border-2 rounded-3"
                   placeholder="••••••••" required>
          </div>

          <div class="mb-3 text-start">
            <label for="confirm-password" class="form-label fw-semibold">Confirmar senha:</label>
            <input type="password" id="confirm-password" name="confirm-password"
                   class="form-control border-2 rounded-3"
                   placeholder="••••••••" required>
          </div>

          <button type="submit" class="btn btn-login w-100 rounded-3 py-2 fw-bold">Registar</button>
        </form>

        <p class="mt-3 mb-0">Já tem uma conta?
          <a href="login.php" class="fw-bold text-decoration-none">Faça login aqui!</a>
        </p>
      </div>
    </div>
  </main>
  <?php 
    require('includes/footer.php');
  ?>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
