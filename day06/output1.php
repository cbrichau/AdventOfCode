<?php

$input = file_get_contents(__DIR__ . '\input.txt');

for ($i = 0; $i <= strlen($input) - 4; $i++)
{
	$marker = substr($input, $i, 4);
	if (count(array_count_values(str_split($marker))) === 4)
		break;
}

echo $i + 4;
// Answer = 1235