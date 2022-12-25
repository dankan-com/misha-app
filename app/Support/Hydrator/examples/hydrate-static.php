<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/** @var Composer\Autoload\ClassLoader $composer */
$composer = include('../vendor/autoload.php');
$composer->addClassMap([
    'FlatDto' => __DIR__ . '/Dtos/FlatDto.php'
]);

/** @var FlatDto $pdo */
$pdo = FlatDto::fromArray([
    'firstname' => 'Иванов',
    'lastname' => 'Иван',
    'post' => 'Директор',
    'status' => 1,
    'salary' => 250000.00
]);

echo '<pre>' . print_r($pdo->toArray(), true) . '</pre>';
