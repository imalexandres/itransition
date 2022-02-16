<?php


$conn = new mysqli('localhost', 'root', '', 'itransition_task3');

if ($conn->connect_error) die("Error: " . $conn->connect_error);