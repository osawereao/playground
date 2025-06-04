<?php
$command = Play::gitCommand();
$zero = Play::gitZero();
if (file_exists($zero)) {
	include $zero;
}

function isCommands(array $command): bool
{
	return count(array_filter($command, 'is_array')) > 0;
}
?>

<p>
	<a href="/git?command=version">version</a> |
	<a href="/git?command=branch">branch</a> |
	<a href="/git?command=working" title="<?php echo $branch; ?>">working</a> |
	<a href="/git?command=initialize" title="<?php echo $branch; ?>">initialize</a>
</p>

<form method="post">
	<div>
		<label for="path">Path</label>
		<input id="path" name="path" type="text" value="<?php echo $path; ?>">
		<label for="gitcmd"><?php echo Play::gitTitle(); ?></label>
		<select id="gitcmd" name="gitcmd" autocomplete="off" />
		<option value="">Select Git</option>
		<?php
		foreach ($command as $label => $cmd):
			if (isCommands($command)) {
				$jsonValue = htmlspecialchars(json_encode($cmd), ENT_QUOTES, 'UTF-8');
				echo "<option value='{$jsonValue}'>{$label}</option>";
			} else { ?>
				<option value="<?= htmlspecialchars($cmd) ?>"><?= htmlspecialchars($label) ?></option>
			<?php }endforeach; ?>
		</select>
		<button type="submit" name="send" onclick="goGit(event);">Send</button>
	</div>

</form>

<div id="gitresult" style="margin:1em auto;"></div>


<script src="<?php Play::js('git'); ?>"></script>