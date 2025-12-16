<?php
$host = 'localhost';
$dbname = 'projeto';
$user = 'web2';
$pass = 'web2';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $dbh = $pdo; 

} catch (PDOException $e) {
    die("Erro na ligação à base de dados: " . $e->getMessage());
}
?>