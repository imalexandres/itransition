<?php
require_once "../structure/header.php";
require_once "../DB/db.php";


unset($_SESSION['logged_user']);

header('Location: main.php');

require __DIR__ . '../structure/footer.php';
