<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
$dotenv->required(['MYSQL_HOST', 'MYSQL_USER', 'MYSQL_PASS', 'MYSQL_DATA']);

include('../templates/page.tpl.php');
