<?php
const RD = __DIR__;
const DS = DIRECTORY_SEPARATOR;
require RD . DS . 'code' . DS . 'play.php';
Play::init(rd: RD, ds: DS);
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo Play::title() ?></title>

		<link rel="apple-touch-icon" sizes="180x180" href="<?php Play::favicon('apple-touch-icon'); ?>">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php Play::favicon('favicon-32x32'); ?>">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php Play::favicon('favicon-16x16'); ?>">
		<link rel="manifest" href="/asset/favicon/site.webmanifest">

		<link rel="stylesheet" href="<?php Play::css('init'); ?>">
		<link rel="stylesheet" href="<?php Play::css('layout'); ?>">
		<link rel="stylesheet" href="<?php Play::css('nav'); ?>">
	</head>

	<body>

		<?php Play::bit('nav'); ?>

		<main>
			<div class="container">
				<h2><?php echo Play::page(include: false); ?></h2>
				<?php Play::page(); ?>
			</div>
		</main>

	</body>

</html>