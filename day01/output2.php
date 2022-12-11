<?php

$groupsOfCalories = require_once('extractInput.php');

foreach ($groupsOfCalories as $groupOfCalories)
	$totals[] = array_sum(explode("\n", $groupOfCalories));

rsort($totals);

echo $totals[0] + $totals[1] + $totals[2];
// Answer = 210367