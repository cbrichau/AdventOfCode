<?php

/**
 * From the input file, returns an array with:
 * 1) A subarray where each row contains a movement in string format.
 * 2) A subarray where each row represents a stack in string format,
 * with the crates' ids starting from the bottom.
 * So the input given in the example:
 *     [D]
 * [N] [C]
 * [Z] [M] [P]
 *  1   2   3
 * Comes out as:
 * [
 *   1 => ZN
 *   2 => MCD
 *   3 => P
 * ]
 */
function extractStacksAndMovementsInput(): array
{
	$input = file_get_contents(__DIR__ . '\input.txt');
	list($stacksInput, $movementsInput) = preg_split("#\n\n#", $input);

	$movements = explode("\n", $movementsInput);

	$stacksRows = explode("\n", $stacksInput);
	unset($stacksRows[count($stacksRows) - 1]); //This is the numbering line, we don't need it.

	$stacks = array_fill_keys(range(1, 1 + strlen($stacksRows[0]) / 4), '');
	foreach ($stacksRows as $stacksRow)
	{
		$crates = str_split($stacksRow, 4);
		foreach ($crates as $id => $crate)
			if (!preg_match('#^\s+$#', $crate))
				$stacks[$id + 1] = substr($crate, 1, 1) . $stacks[$id + 1];
	}

	return [
		'stacks' => $stacks,
		'movements' => $movements
	];
}

return extractStacksAndMovementsInput();
