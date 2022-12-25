<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/** @var Composer\Autoload\ClassLoader $composer */
$composer = include('../vendor/autoload.php');
$composer->addClassMap([
    'RootDto' => __DIR__ . '/Dtos/RootDto.php',
    'Location' => __DIR__ . '/Dtos/Location.php',
    'PlaceWork' => __DIR__ . '/Dtos/PlaceWork.php',
]);

/** @var RootDto $pdo */
$pdo = RootDto::fromArray([
    'firstname' => 'Иванов',
    'lastname' => 'Иван',
    'post' => 'Директор',
    'status' => 1,
    'probation' => 1,
    'salary' => 250000.00,
    'location' => [
        'country' => 'Россия',
        'city' => 'Краснодар'
    ],
    'placeWorks' => [
        [
            'companyName' => 'aic',
            'dateStart' => '2019-08-21',
            'dateEnd' => '2019-08-21'
        ]
    ]
]);

echo '<pre>' . print_r($pdo, true) . '</pre>';

