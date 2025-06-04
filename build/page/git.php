<?php
$command = Play::gitCommand();
$zero = Play::gitZero();
if (file_exists($zero)) {
	include $zero;
}
?>

<p>
	<a href="/git?command=version">version</a>
	<a href="/git?command=branch">branch</a>
</p>

<form method="post">
	<div>
		<label for="path">Path</label>
		<input id="path" name="path" type="text" value="<?php echo $path; ?>">
		<label for="gitcmd"><?php echo Play::gitTitle(); ?></label>
		<select id="gitcmd" name="gitcmd" autocomplete="off" />
		<option value="">Select Git</option>
		<?php foreach ($command as $label => $cmd): ?>
			<option value="<?= htmlspecialchars($cmd) ?>"><?= htmlspecialchars($label) ?></option>
		<?php endforeach; ?>
		</select>
		<button type="submit" name="send" onclick="goGit(event);">Send</button>
	</div>

</form>

<div id="gitresult" style="margin:1em auto;"></div>


<script src="<?php Play::js('git'); ?>"></script>