<?php
$imagePath = 'img/demo/gallery/';
if (!empty($_FILES['image']['name'])) {
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

    foreach($_FILES['image']['name'] as $key => $fileName){
        saveImage($fileName, $_FILES['image']['tmp_name'][$key], $imagePath, $stmt);
    }

}
header('Location: task_18.php');

function saveImage($imageName, $imageTmpName, $imagePath, $stmt){
    $pathParts = pathinfo($imageName);
    $newFileName = uniqid() . '.' . $pathParts['extension'];
    $newPathFile = $imagePath . $newFileName;
    if (move_uploaded_file($imageTmpName, $newPathFile)) {
        $stmt->execute(['image' => $imagePath . $newFileName]);
    }
}