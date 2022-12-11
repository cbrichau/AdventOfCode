<?php

$rounds = require_once('extractInput.php');

$points = [
	// Draw
	'A Y' => 3 + 1,
	'B Y' => 3 + 2,
	'C Y' => 3 + 3,
	// Win
	'A Z' => 6 + 2,
	'B Z' => 6 + 3,
	'C Z' => 6 + 1,
	// Lose
	'A X' => 0 + 3,
	'B X' => 0 + 1,
	'C X' => 0 + 2,
];

$score = 0;
foreach ($rounds as $round)
	$score += $points[$round];

echo $score;
// Answer = 8295