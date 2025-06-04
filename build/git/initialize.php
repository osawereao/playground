<?php
// @ initialize git :: AO™ | osawere.com

require __DIR__ . DIRECTORY_SEPARATOR . 'zero.php';

return [

	// » Remote repo is not empty

	// → step 1: clone
	'clone' => 'clone ' . $url,

	// → step 2a: fetch an existing branch from remote & create locally (not default)
	'remote' => [
		'fetch' => 'fetch origin',
		'checkout' => 'checkout -b ' . $branch . ' origin/' . $branch
	],

	// → step 2b: create a branch locally (not default)
	'local' => [
		'checkout' => 'checkout -b ' . $branch
	],

	// → step 2c: switch to existing branch & sync remote
	'load '.$branch => [
		'switch' => 'checkout ' . $branch,
		'pull' => 'pull' // upstream tracking ELSE [git pull origin $branch]
	],

	// → step 3: work on files, locally

	// → step 4: add, commit & push
	'save' => [
		'add' => 'add .',
		'commit' => 'commit -m "' . $message . '"',
		'push' => 'push'
	],





	// » Remote repo is empty

	// → step 1: create
	'create' => [
		'init' => 'init -b ' . $branch,
		'readme' => 'echo "# ' . ucwords($repo) . '" > README.md',
		'ignore' => 'touch .gitignore',
		'add' => 'add README.md .gitignore',
		'commit' => 'commit -m "' . $message . '"',
		'origin' => 'remote add origin ' . $url,
		'push' => 'push -u origin ' . $branch,
	],

	// → step 2: work on files, locally

	// → step 3: [run save from step 4 above]
];