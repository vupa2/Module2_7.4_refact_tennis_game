<?php

require_once 'src/TennisGame.php';

$tennisGame = new TennisGame('Alice', 'Bob');
$tennisGame->setScore(1, 2);

$result = $tennisGame->getScore();

echo $result;