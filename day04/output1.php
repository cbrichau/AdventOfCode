<?php

$input = file_get_contents(__DIR__ . '\input.txt');
$pairs = explode("\n", $input);
$count = 0;

foreach ($pairs as $pair)
{
	$sections = preg_split('#,|\-#', $pair);
	if (
		($sections[0] >= $sections[2] && $sections[1] <= $sections[3]) ||
		($sections[2] >= $sections[0] && $sections[3] <= $sections[1])
	)
		$count++;
}

echo $count;
// Answer = 503
