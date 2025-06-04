<?php
// NOTE: this is quick and dirty (NOT FOR PRODUCTION!)
class Git
{
	static function output($input, $output, $error = false)
	{
		$color = $error ? '#f66' : '#0f0';
		$res = '<div style="margin-bottom: 1rem;">';
		$res .= '<div style="color: #61dafb;"><strong>$ git ' . htmlspecialchars($input) . '</strong></div>';
		if (!empty($output)) {
			$res .= '<div style="color: ' . $color . '; white-space: pre-wrap;">' . htmlspecialchars($output) . '</div>';
		}
		$res .= '</div>';
		return $res;
	}

	static function run($command, $path)
	{
		$command = trim($command);

		// $path = escapeshellarg($path);

		$shellCommand = "cd /d \"$path\" && git $command 2>&1";
		// $shellCommand = "cd /d $path && git $command 2>&1";
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

	$res = '<div style="font-family: monospace; background: #111; color: white; padding: 1em; border-radius: 4px;  margin: 0.5rem auto;">';
	if ($command === 'version') {
		$res .= Git::version();
	} else {

		if (str_contains($command, 'clone')) {
			$command = trim($command);
			$command = json_decode($command) . ' .';
			// var_dump($command);
			$res .= Git::run($command, $path);
		} else {
			$decoded = json_decode($command, true);
			if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {

				foreach ($decoded as $cmd) {
					$res .= Git::run($cmd, $path);
				}

			} elseif (is_string($command)) {
				$res .= Git::run($command, $path);
			}
		}
	}
	echo $res . '</div>';
}