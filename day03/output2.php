<?php

$bags = require_once('extractInput.php');
$total = 0;

for ($i = 0; $i < count($bags); $i += 3)
{
	$commonItem = implode('', array_unique(array_intersect(
		str_split($bags[$i]),
		str_split($bags[$i + 1]),
		str_split($bags[$i + 2])
	)));
	$total += ord($commonItem[0]) - (ctype_lower($commonItem[0]) ? 96 : 38);
}

echo $total;
// Answer = 2587