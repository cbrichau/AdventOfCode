<?php

/**
 * Goes through the fileSystem and finds the smallest directory
 * that has at least the space needed.  
 */
function getSmallestSizeToFreeUp(array $fileSystem, int $spaceNeeded, int $smallestSizeToFreeUp): int
{
	if ($fileSystem['size'] >= $spaceNeeded && $fileSystem['size'] < $smallestSizeToFreeUp)
		$smallestSizeToFreeUp = $fileSystem['size'];

	foreach ($fileSystem as $dirName => $subFileSystem)
	{
		if ($dirName === 'size')
			continue;
		$smallestSizeToFreeUp = getSmallestSizeToFreeUp($subFileSystem, $spaceNeeded, $smallestSizeToFreeUp);
	}

	return $smallestSizeToFreeUp;
}

$fileSystem = require_once('extractInput.php');

$spaceAvailable = 70000000 - $fileSystem['size'];
$spaceNeeded = 30000000 - $spaceAvailable;

$smallestSizeToFreeUp = getSmallestSizeToFreeUp($fileSystem, $spaceNeeded, 70000000);

echo $smallestSizeToFreeUp;
// Answer = 1623571