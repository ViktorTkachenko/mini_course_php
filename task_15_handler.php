<?php
session_start();
if ($_GET['auto'] and $_GET['auto']== 'logout') {
    unset($_SESSION['login']);
    header('Location: task_14.php');
}