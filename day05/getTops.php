<?php

/**
 * Returns the top of each stack.
 */
function getTops(array $stacks): string
{
	$tops = '';
	foreach ($stacks as $stack)
		$tops .= substr($stack, -1);
	return $tops;
}
