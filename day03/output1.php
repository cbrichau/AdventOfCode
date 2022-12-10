<?php

$input = file_get_contents(__DIR__ . '\input.txt');
$bags = explode("\n", $input);
$total = 0;

/**
 * @var array $bags
 * @var string $items
 * @var array $pocket1
 * @var array $pocket2
 */
foreach ($bags as $items)
{
	list($pocket1, $pocket2) = array_chunk(str_split($items), strlen($items) / 2);
	$commonItems = array_unique(array_intersect($pocket1, $pocket2));
	foreach ($commonItems as $commonItem)
		$total += ord($commonItem) - (ctype_lower($commonItem) ? 96 : 38);
}

echo $total;
# Answer = 8240