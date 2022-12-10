<?php

$input = require_once('extractInput.php');

function getFinalArrangement(array $stacks, array $movements): array
{
	foreach ($movements as $movement)
	{
		preg_match('#^move (\d+) from (\d+) to (\d+)$#', $movement, $matches);
		list($pattern, $quantity, $fromId, $toId) = $matches;
		for ($i = 0; $i < $quantity; $i++)
		{
			$stacks[$toId] .= substr($stacks[$fromId], -1);
			$stacks[$fromId] = substr_replace($stacks[$fromId], '', -1);
		}
	}
	return $stacks;
}

$stacks = getFinalArrangement($input['stacks'], $input['movements']);

require_once('getTops.php');
$tops = getTops($stacks);

echo $tops;
// Answer = SPFMVDTZT