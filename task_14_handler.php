<?php
session_start();

if (!empty($_POST['mail'])) {
    $host = '127.0.0.1';
    $db   = 'marlindev';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

    $mail = trim($_POST['mail']);
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :mail');
    $stmt->execute(['mail' => $mail]);
    $userList = $stmt->fetchAll();
    if (empty($userList)) {
        $_SESSION['error'] = 'Неверный логин или пароль';
        header('Location: task_14.php');
        exit;
    }
    if (!password_verify($_POST['password'], $userList['0']['password'])) {
        $_SESSION['error'] = 'Неверный логин или пароль';
        header('Location: task_14.php');
        exit;
    }
    $_SESSION['login'] = $_POST['mail'];
    header('Location: task_15.php');
    exit;
}
header('Location: task_14.php');
