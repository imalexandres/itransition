<?php
require_once "../libs/rb-mysql.php";


R::setup( 'mysql:host=localhost;dbname=itransition_task3',
    'root', '' );
if(!R::testConnection()) die('No DB connection!');


session_start();
