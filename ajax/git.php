<?php
class Git
{
	static function output($input, $output, $error = false)
	{
		$color = $error ? '#f66' : '#0f0';
		echo '<div style="margin-bottom: 1rem;">';
		echo '<div style="color: #61dafb;"><strong>$ git ' . htmlspecialchars($input) . '</strong></div>';
		echo '<div style="color: ' . $color . '; white-space: pre-wrap;">' . htmlspecialchars($output) . '</div>';
		echo '</div>';
	}

	static function run($command, $path)
	{
		$command = trim($command);
		$shellCommand = "cd /d $path && git $command 2>&1";
		$output = shell_exec($shellCommand);
		return self::output($command, $output);
	}

	static function version($command = 'git --version 2>&1')
	{
		$output = shell_exec($command);
		return self::output($command, $output);
	}
}


// var_dump($_POST);
if (!empty($_POST['command'])) {
	header('Content-Type: text/html');
	$command = $_POST['command'];
	if (!empty($_POST['path'])) {
		$path = $_POST['path'];
	}

	echo '<div style="font-family: monospace; background: #111; color: white; padding: 1em; border-radius: 4px;  margin: 0.5rem auto;">';
	if ($command === 'version') {
		Git::version();
	} else {

		$decoded = json_decode($command, true);
		if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
			foreach ($decoded as $command) {
				Git::run($command, $path);
			}
		} else {
			Git::run($command, $path);
		}
	}
	echo '</div>';
}