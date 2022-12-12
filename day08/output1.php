<?php

function markVisibleTrees(array $trees, int $lastRow, int $lastCol): array
{
	$visibleTrees = [];

	for ($row = 0; $row <= $lastRow; $row++)
	{
		$highestFromLeft = -1;
		$highestFromRight = -1;
		for ($col = 0; $col <= $lastCol; $col++)
		{
			$visibleTrees[$row][$col] ??= 0;
			if ($trees[$row][$col] > $highestFromLeft)
			{
				$visibleTrees[$row][$col]++;
				$highestFromLeft = $trees[$row][$col];
			}

			$visibleTrees[$row][$lastCol - $col] ??= 0;
			if ($trees[$row][$lastCol - $col] > $highestFromRight)
			{
				$visibleTrees[$row][$lastCol - $col]++;
				$highestFromRight = $trees[$row][$lastCol - $col];
			}
		}

		ksort($visibleTrees[$row]);
	}

	return $visibleTrees;
}

function countVisibleTrees(array $visibleTreesPerRow, array $visibleTreesPerCol, int $lastRow, int $lastCol): int
{
	$numberOfVisibleTrees = 0;

	for ($row = 0; $row <= $lastRow; $row++)
		for ($col = 0; $col <= $lastCol; $col++)
			if ($visibleTreesPerRow[$row][$col] !== 0 || $visibleTreesPerCol[$col][$row] !== 0)
				$numberOfVisibleTrees++;

	return $numberOfVisibleTrees;
}

list($treesPerRow, $treesPerCol) = require_once('extractInput.php');

$lastRow = count($treesPerRow) - 1;
$lastCol = count($treesPerRow[0]) - 1;

$visibleTreesPerRow = markVisibleTrees($treesPerRow, $lastRow, $lastCol);
$visibleTreesPerCol = markVisibleTrees($treesPerCol, $lastRow, $lastCol);

$numberOfVisibleTrees = countVisibleTrees($visibleTreesPerRow, $visibleTreesPerCol, $lastRow, $lastCol);

echo $numberOfVisibleTrees;
// Answer = 1679