<?php
// 1. Iniciar a sessão para ter acesso a ela
session_start();

// 2. Limpar todas as variáveis de sessão (apagar os dados do utilizador da memória)
$_SESSION = array();

// 3. (Opcional mas recomendado) Apagar o cookie da sessão se existir
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Destruir a sessão definitivamente
session_destroy();

// 5. Redirecionar para a página inicial (Login ou Index)
header("Location: index.php");
exit;
?>