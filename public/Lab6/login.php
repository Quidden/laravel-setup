<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form.html');
    exit;
}

$name = $_POST['name'] ?? '';
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
    $pdo = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE name = :name");
    $stmt->execute(['name' => $name]);
    $user = $stmt->fetch();

    if ($user && $user['password'] === md5($password)) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header('Location: welcome_page.php');;
    } else {
        echo "error.";
    }

} catch (PDOException $e) {
    die("errDB: " . $e->getMessage());
}
