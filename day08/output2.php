<?php

function viewAhead(array $treesInSight, int $pos, int $dir)
{
	$treeHeight = $treesInSight[$pos];
	$numberOfVisibleTrees = 0;

	while (isset($treesInSight[$pos + $dir]))
	{
		$pos += $dir;
		$numberOfVisibleTrees++;
		if ($treesInSight[$pos] >= $treeHeight)
			break;
	}

	return $numberOfVisibleTrees;
}

function getMaxView(array $treesPerRow, array $treesPerCol): int
{
	$lastRow = count($treesPerRow) - 1;
	$lastCol = count($treesPerRow[0]) - 1;
	$maxView = 0;

	for ($row = 1; $row < $lastRow; $row++)
	{
		for ($col = 1; $col < $lastCol; $col++)
		{
			$rightView = viewAhead($treesPerRow[$row], $col, 1);
			$leftView = viewAhead($treesPerRow[$row], $col, -1);
			$topView = viewAhead($treesPerCol[$col], $row, -1);
			$bottomView = viewAhead($treesPerCol[$col], $row, 1);

			$fullView = $rightView * $leftView * $topView * $bottomView;
			if ($fullView > $maxView)
				$maxView = $fullView;
		}
	}

	return $maxView;
}

list($treesPerRow, $treesPerCol) = require_once('extractInput.php');

$maxView = getMaxView($treesPerRow, $treesPerCol);

echo $maxView;
// Answer = 536625