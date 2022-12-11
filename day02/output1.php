<?php

$rounds = require_once('extractInput.php');

$points = [
	'X' => 1, // Rock
	'Y' => 2, // Paper
	'Z' => 3, // Scissors
	// Draw
	'A X' => 3,
	'B Y' => 3,
	'C Z' => 3,
	// Win
	'A Y' => 6,
	'B Z' => 6,
	'C X' => 6,
	// Lose
	'A Z' => 0,
	'B X' => 0,
	'C Y' => 0,
];

$score = 0;
foreach ($rounds as $round)
	$score += $points[$round] + $points[substr($round, -1)];

echo $score;
// Answer = 11150