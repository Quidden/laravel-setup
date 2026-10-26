<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form.html');
    exit;
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->safeLoad();

$db_host = getenv('DB_HOST') ?: 'postgres';
$db_name = getenv('DB_DATABASE') ?: getenv('POSTGRES_DB') ?: '';
$db_user = getenv('DB_USERNAME') ?: getenv('POSTGRES_USER') ?: '';
$db_pass = getenv('DB_PASSWORD') ?: getenv('POSTGRES_PASSWORD') ?: '';

try {
    $dsn = "pgsql:host=$db_host;dbname=$db_name";

    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);


    $sql_insert = "INSERT INTO users (name, email, password)
                   VALUES (:name, :email, :password)
                   ON CONFLICT (name) DO NOTHING";

    $stmt = $pdo->prepare($sql_insert);
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'password' => md5($password)
    ]);

    $query = $pdo->query("SELECT id, name, email, created_at FROM users");
    $users = $query->fetchAll();

} catch (PDOException $e) {
    die("Err: " . $e->getMessage());
}
