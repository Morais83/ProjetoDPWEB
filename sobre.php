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
        require_once(PROJECT_ROOT . '/includes/nav.php');
    ?>

    <main class="container py-5 text-left">

    <!-- SOBRE NÓS -->
    <section class="mb-5">
        <h1 class="section-title display-5 mb-3">Sobre o Polyglot Play</h1>
        <p class="text-secondary">
            O <strong>Polyglot Play</strong> nasceu com o objetivo de tornar a aprendizagem de línguas simples, rápida e envolvente.
            Através de quizzes curtos e interativos, qualquer pessoa pode aprender um novo idioma de forma divertida e ao seu próprio ritmo.
        </p>
        <p class="text-secondary">
            A missão da plataforma é proporcionar sessões de estudo rápidas que possam ser realizadas em qualquer momento do dia,
            transformando a aprendizagem num hábito natural.
        </p>
    </section>

    <!-- NOSSA EQUIPA -->
    <section class="row align-items-center g-4 mb-5 bg-custom py-4 rounded-3">
            <div class="col-lg-12 text-center">
                <h2 class="section-title mb-4">Nossa Equipa</h2>
                <p class="text-secondary mb-5">Conheça as pessoas por trás do Polyglot Play!</p>
            </div>

            <div class="col-md-6">
                <div class="card card-team shadow-sm rounded-3">
                    <div class="d-flex justify-content-center py-4">
                        <i class="bi bi-person-circle" style="font-size: 4rem; color: #6c757d;"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="team-name">José Fernandes</h5>
                        <p class="team-role">Co-fundador e Linguista</p>
                        <p class="text-secondary">José é apaixonado por idiomas e dedica-se a criar métodos de aprendizagem eficazes e envolventes. O seu objetivo é tornar a aprendizagem de línguas acessível e divertido para todos.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-team shadow-sm rounded-3">
                    <div class="d-flex justify-content-center py-4">
                        <i class="bi bi-person-circle" style="font-size: 4rem; color: #6c757d;"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="team-name">João Morais</h5>
                        <p class="team-role">Co-Fundador, Desenvolvedor Chefe</p>
                        <p class="text-secondary">João é o cérebro por trás da tecnologia, garantindo que a plataforma funciona perfeitamente e seja intuitiva para os utilizadores, focado sempre na experiência de aprendizagem.</p>
                    </div>
                </div>
            </div>
    </section>

    <!-- CONTACTO -->
    <section class="mb-5">
        <h2 class="section-title mb-3">Entre em Contacto</h2>
        <p class="text-secondary">
            Tem alguma dúvida ou sugestão? Estamos sempre disponíveis para ajudar!
        </p>
        <p class="text-secondary">
            E-mail: <strong><a href="mailto:contacto@polyglotplay.com">contacto@polyglotplay.com</a></strong>
        </p>

        <p class="text-secondary">
            Redes sociais:
            <a href="#" class="ms-2"><i class="bi bi-facebook"></i></a>
            <a href="#" class="ms-2"><i class="bi bi-instagram"></i></a>
            <a href="#" class="ms-2"><i class="bi bi-twitter"></i></a>
        </p>
    </section>

</main>
    
    <?php 
        require('includes/footer.php');
    ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>