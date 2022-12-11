<?php

$input = file_get_contents(__DIR__ . '\input.txt');
$bags = preg_split('#(\r\n)|\r|\n#', $input);

return $bags;
