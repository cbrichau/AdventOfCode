<?php

/**
 * Reads the $terminal until the next command,
 * keeping track of the sum of the files' sizes
 * and the number of lines read.
 */
function getSumOfListedElementsSizes($terminal): array
{
	$line = 0;
	$totalSize = 0;

	while (isset($terminal[$line]) && substr($terminal[$line], 0, 1) !== '$')
	{
		$content = explode(' ', $terminal[$line]);
		if ($content[0] !== 'dir')
			$totalSize += $content[0];
		$line++;
	}

	return [$line, $totalSize];
}

/**
 * Recursively follows each cd, going down one level on `cd name`,
 * and up one level on `cd ..`, keeping track of the lines read in children
 * to skip them when read the parent again.
 */
function readTerminal($terminal): array
{
	$fileSystem = ['size' => 0];

	for ($line = 0; $line < count($terminal); $line++)
	{
		$command = explode(' ', $terminal[$line]);

		if ($command[1] === 'cd')
		{
			$dir = $command[2];

			if ($dir === '..')
				return [$line + 1, $fileSystem];

			list($numberOfLinesRead, $children) = readTerminal(array_slice($terminal, $line + 1));
			$line += $numberOfLinesRead;
			$fileSystem[$dir] = $children;
			$fileSystem['size'] += $fileSystem[$dir]['size'];

			continue;
		}

		if ($command[1] === 'ls')
		{
			list($numberOfLinesRead, $fileSystem['size']) = getSumOfListedElementsSizes(array_slice($terminal, $line + 1));
			$line += $numberOfLinesRead;
			continue;
		}
	}

	return [$line, $fileSystem];
}

$input = file_get_contents(__DIR__ . '\input.txt');
$terminal = preg_split("#(\r\n)|\r|\n#", $input);

$fileSystem = readTerminal($terminal);

return $fileSystem[1]['/'];
