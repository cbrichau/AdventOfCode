<?php

$input = file_get_contents(__DIR__ . '\input.txt');

for ($i = 0; $i <= strlen($input) - 14; $i++)
{
	$marker = substr($input, $i, 14);
	if (count(array_count_values(str_split($marker))) === 14)
		break;
}

echo $i + 14;
// Answer = 3051