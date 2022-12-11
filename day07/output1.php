<?php

/**
 * Goes through the fileSystem and adds up all sizes under 100000. 
 */
function getTotalSizeOfSmallDirectories(array $fileSystem): int
{
	$totalSize = ($fileSystem['size'] <= 100000 ? $fileSystem['size'] : 0);

	foreach ($fileSystem as $dirName => $subFileSystem)
	{
		if ($dirName === 'size')
			continue;
		$totalSize += getTotalSizeOfSmallDirectories($subFileSystem);
	}

	return $totalSize;
}

$fileSystem = require_once('extractInput.php');
$totalSize = getTotalSizeOfSmallDirectories($fileSystem);

echo $totalSize;
// Answer = 1778099