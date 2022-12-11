<?php

$groupsOfCalories = require_once('extractInput.php');
$max = 0;

foreach ($groupsOfCalories as $groupOfCalories)
{
	$total = array_sum(explode("\n", $groupOfCalories));
	if ($total > $max)
		$max = $total;
}

echo $max;
// Answer = 72478