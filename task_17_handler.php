<?php
$imagePath = 'img/demo/gallery/';

if (!empty($_FILES['image']['name'])) {
    $pathParts = pathinfo($_FILES['image']['name']);
    $newFileName = uniqid() . '.' . $pathParts['extension'];
    $newPathFile = $imagePath . $newFileName;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $newPathFile)) {
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

        $stmt = $pdo->prepare('INSERT INTO images SET image = :image');
    }
} elseif (isset($_GET['delimage'])) {
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
    $stmt = $pdo->prepare('DELETE FROM images WHERE id = :imageid');
    $stmt->execute(['imageid' => (int)$_GET['delimage']]);
}
header('Location: task_17.php');