<?php

$input = file_get_contents(__DIR__ . '\input.txt');
$groupsOfCalories = preg_split("#\n\s\n#", $input);
$max = 0;

foreach ($groupsOfCalories as $groupOfCalories)
{
	$total = array_sum(explode("\n", $groupOfCalories));
	if ($total > $max)
		$max = $total;
}

echo $max;
// Answer = 72478