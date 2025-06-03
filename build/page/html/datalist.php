<?php
$fruits = [
	'Apple',
	'Banana',
	'Grape',
	'Pineapple',
	'Orange',
	'Mango',
	'Strawberry',
	'Blueberry',
	'Raspberry',
	'Blackberry',
	'Watermelon',
	'Cantaloupe',
	'Honeydew',
	'Peach',
	'Nectarine',
	'Pear',
	'Kiwi',
	'Plum',
	'Grapefruit',
	'Tangerine',
	'Clementine',
	'Lemon',
	'Lime',
	'Papaya',
	'Dragon Fruit',
	'Passion Fruit',
	'Guava',
	'Fig',
	'Lychee',
	'Date'
];
?>

<form method="post">
	<div>
		<label for="fruit">List of Fruits</label>
		<input id="fruit" list="fruits" name="fruit" oninput="filterList()" placeholder="fruit (e.g., orange)" autocomplete="off" />
		<datalist id="fruits">
			<?php foreach ($fruits as $fruit): ?>
				<option value="<?= htmlspecialchars($fruit) ?>">
				<?php endforeach; ?>
		</datalist>

		<button type="submit">Send</button>
	</div>
</form>

<script>
	const datalist = document.getElementById("fruits");
	const allOptions = Array.from(datalist.options).map(opt => opt.value);

	function filterList() {
		const input = document.getElementById("fruit").value.toLowerCase();
		datalist.innerHTML = "";
		allOptions
			.filter(opt => opt.toLowerCase().includes(input))
			.forEach(value => {
				const option = document.createElement("option");
				option.value = value;
				datalist.appendChild(option);
			});
	}
</script>

<?php
$fruitSelected = Play::form('fruit');
if (!empty($fruitSelected)) { ?>
	<p>
		<small>
			<em>
				<strong>Fruit is:</strong>
				<?php echo $fruitSelected . '!'; ?>
			</em>
		</small>
	</p>
<?php } ?>