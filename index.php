<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Advent Of Code 2022</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<h1>Advent Of Code 2022</h1>

	<table>
		<tr>
			<th></th>
			<th>Problem</th>
			<th>Solution</th>
		</tr>
		<?php for ($i = 1; $i <= 4; $i++) : ?>
			<?php $d = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
			<tr>
				<td>
					Day <?php echo $d; ?>
				</td>
				<td>
					<?php $link = 'https://adventofcode.com/2022/day/' . $i; ?>
					<p><a href="<?php echo $link ?>" target="_blank">Part 1</a></p>
					<p><a href="<?php echo $link ?>#part2" target="_blank">Part 2</a></p>
				</td>
				<td>
					<?php $file = 'https://github.com/cbrichau/AdventOfCode/blob/master/day' . $d . '/output'; ?>
					<?php $output = '/day' . $d . '/output'; ?>
					<p><a href="<?php echo $file ?>1.php" target="_blank">File 1</a> - <a href="<?php echo $output ?>1.php">Output 1</a></p>
					<p><a href="<?php echo $file ?>2.php" target="_blank">File 2</a> - <a href="<?php echo $output ?>2.php">Output 2</a></p>
				</td>
			</tr>
		<?php endfor; ?>
	</table>

</body>

</html>