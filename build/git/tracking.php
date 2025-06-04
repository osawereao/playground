<?php
// @ tracking repo :: AO™ | osawere.com

require __DIR__ . DIRECTORY_SEPARATOR . 'zero.php';
// $branch = 'abino';
$message = 'Start ' . $branch;

// NOTE: tracking is also for creating new

return [

	// CREATING NEW FROM LOCAL

	// → step 1: create & switch to branch
	'create ' . $branch => 'checkout -b ' . $branch,

	// → step 2: do work on files in repo

	// → step 3: add, commit & push to remote
	'save ' . $branch => [
		'add' => 'add .',
		'commit' => 'commit -m "' . $message . '"',
		'push' => 'push -u origin ' . $branch
	],



	// CREATING FROM REMOTE (existing)
	'remote ' . $branch => [
		'fetch' => 'fetch origin',
		// creating new local from remote
		'create' => 'checkout -b ' . $branch . ' origin/' . $branch,

		// set existing local to existing remote
		'track' => 'branch --set-upstream-to=origin/' . $branch . ' ' . $branch
	]
];