<?php
// @ working on local repo :: AO™ | osawere.com

require __DIR__ . DIRECTORY_SEPARATOR . 'zero.php';

return [
	// → step 1: switch to existing branch & sync remote
	'load '.$branch => [
		'switch' => 'checkout ' . $branch,
		'pull' => 'pull' // upstream tracking ELSE [git pull origin $branch]
	],

	// → step 2: work on files

	// → step 3: add, commit & push remote
	'save '.$branch => [
		'add' => 'add .', // OR git add file1.js file2.css
		'commit' => 'commit -m "' . $message . '"',
		'push' => 'push' // upstream tracking ELSE [git push origin $branch]
	]

];