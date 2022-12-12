<?php

$input = file_get_contents(__DIR__ . '\input.txt');
$grid = preg_split("#(\r\n)|\r|\n#", $input);

foreach ($grid as $row => $treeRow)
	$treesPerRow[$row] = str_split($treeRow);
$treesPerCol = array_map(null, ...$treesPerRow);

return [$treesPerRow, $treesPerCol];
