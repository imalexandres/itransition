<?php
$title="Text Message";
require_once "../DB/db.php";
require_once "../DB/conn.php";

$data = $_POST;
$reply = '';
if (!empty($_POST['reply'])) {
    $reply = $_POST['reply'];
}

$current_user = $_SESSION['logged_user']->name;
?>