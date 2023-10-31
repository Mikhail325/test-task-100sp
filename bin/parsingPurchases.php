<?php

use Mikail325\TestTask100sp\Connection;
use Mikail325\TestTask100sp\Migration;
use Mikail325\TestTask100sp\Parsing;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

$pdo = Connection::connect();
Migration::migrate($pdo);

$analysis = new Parsing($pdo);
$analysis->parsing();