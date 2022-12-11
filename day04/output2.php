<?php

$pairs = require_once('extractInput.php');
$count = 0;

function isBetween($start, $val, $end): bool
{
	return ($start <= $val && $val <= $end);
}

foreach ($pairs as $pair)
{
	list($startA, $endA, $startB, $endB) = preg_split('#,|\-#', $pair);
	if (
		isBetween($startB, $startA, $endB) ||
		isBetween($startB, $endA, $endB) ||
		isBetween($startA, $startB, $endA) ||
		isBetween($startA, $endB, $endA)
	)
		$count++;
}

echo $count;
// Answer = 827
