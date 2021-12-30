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
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    $stmt = $pdo->prepare('SELECT email FROM users WHERE email = :mail');
    $stmt->execute(['mail' => $mail]);
    $textList = $stmt->fetchAll();
    if (empty($textList)) {
        $stmt = $pdo->prepare('INSERT INTO users SET email = :mail, `password` = :password');
        $stmt->execute(['mail' => $mail, 'password' => $password]);
    } else {
        $_SESSION['error'] = 'Этот эл адрес уже занят другим пользователем';
    }
    header('Location: task_11.php');
}