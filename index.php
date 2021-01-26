<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required(['MYSQL_HOST', 'MYSQL_USER', 'MYSQL_PASS', 'MYSQL_DATA']);

include('templates/page.tpl.php');

// Dev, remove on live
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
