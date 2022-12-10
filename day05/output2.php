<?php

$input = require_once('extractInput.php');

function getFinalArrangement(array $stacks, array $movements): array
{
	foreach ($movements as $movement)
	{
		preg_match('#^move (\d+) from (\d+) to (\d+)$#', $movement, $matches);
		list($pattern, $quantity, $fromId, $toId) = $matches;
		$stacks[$toId] .= substr($stacks[$fromId], -$quantity);
		$stacks[$fromId] = substr_replace($stacks[$fromId], '', -$quantity);
	}
	return $stacks;
}

$stacks = getFinalArrangement($input['stacks'], $input['movements']);

require_once('getTops.php');
$tops = getTops($stacks);

echo $tops;
// Answer = ZFSJBPRFP