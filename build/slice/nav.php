<?php
$menu = [
	'home' => 'home',
	'datalist' => 'html/datalist'
];
?>

<nav>

	<header>
		<h1><a href="/" class="brand"><img src="<?php Play::logo('icon'); ?>"> Playground™</a></h1>
		<button id="toggle">☰</button>
	</header>

	<ul>

		<?php
		foreach ($menu as $label => $item) {
			echo "<li><a href=\"/$item\">" . Play::formatTitle($label) . '</a></li>';
		}
		?>

	</ul>
</nav>

<script src="<?php Play::js('nav'); ?>"></script>