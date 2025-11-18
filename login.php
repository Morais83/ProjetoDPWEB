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
        $hideLoginButton = true;
        require('includes/nav.php');
    ?>

    <main class="center-area py-4">
        <div class="container">
            <div class="auth-box mx-auto text-center">
                <h2 class="fw-bold mb-4 lh-sm">Faça login para se<br>divertir e aprender<br>mais rápido</h2>

                <form action="index.php" method="post">
                <div class="mb-3 text-start">
                    <label for="username" class="form-label fw-semibold">Nome de utilizador ou E-mail:</label>
                    <input id="username" name="username" type="text"
                        class="form-control border-2 rounded-3"
                        placeholder="utilizador@gmail.com" required>
                </div>

                <div class="mb-3 text-start">
                    <label for="password" class="form-label fw-semibold">Senha:</label>
                    <input id="password" name="password" type="password"
                        class="form-control border-2 rounded-3"
                        placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-login w-100 rounded-3 py-2 fw-bold">Entrar</button>
                </form>

                <p class="mt-3 mb-0">Não tem uma conta de utilizador?
                <a href="registo.php" class="fw-bold text-decoration-none">Registe-se agora mesmo!</a>
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