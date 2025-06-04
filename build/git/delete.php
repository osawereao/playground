<?php
// @ delete branch :: AO™ | osawere.com

require __DIR__ . DIRECTORY_SEPARATOR . 'zero.php';
// $branch = 'abino';

return [
	'switch to main' => 'checkout main',
	'delete local ' . $branch => 'branch -D ' . $branch,
	'delete remote ' . $branch => 'push origin --delete ' . $branch
];