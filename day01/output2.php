<?php

$input = file_get_contents(__DIR__ . '\input.txt');
$groupsOfCalories = preg_split("#\n\s\n#", $input);

foreach ($groupsOfCalories as $groupOfCalories)
	$totals[] = array_sum(explode("\n", $groupOfCalories));

rsort($totals);

echo $totals[0] + $totals[1] + $totals[2];
// Answer = 210367