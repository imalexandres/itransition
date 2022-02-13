<?php

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'itransition_task3';

$conn = new mysqli('localhost', 'root', '', 'itransition_task3');

if ($conn->connect_error) die("Error: " . $conn->connect_error);