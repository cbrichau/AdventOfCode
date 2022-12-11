<?php

$input = file_get_contents(__DIR__ . '\input.txt');
$groupsOfCalories = preg_split("#\n\s\n#", $input);

return $groupsOfCalories;
