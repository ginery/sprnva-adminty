<?php

return [
	'database' => [
		'name' => $config["name"],
		'username' => $config["username"],
		'password' => $config["password"],
		'connection' => $config["connection"],
		'options' => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
		]
	],

	'app' => [
		'base_url' => $config["base_url"] . '/',
		'name' => $config["app_name"],

		// choices: development, production
		'environment' => $config["environment"],

		// choices to encode: windows, macOS, linux
		'OS' => $config["os"],
	]
];
