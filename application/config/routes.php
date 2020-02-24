<?php

return [
	
	// MainController
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'main/index/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'post/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'post',
	],
	'add' => [
		'controller' => 'main',
		'action' => 'add',
	],
	'login' => [
		'controller' => 'main',
		'action' => 'login',
	],
	'logout' => [
		'controller' => 'main',
		'action' => 'logout',
	],
	'status/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'status',
	],
	'edit/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'edit',
	],
	'delete/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'delete',
	],
	'settings' => [
		'controller' => 'main',
		'action' => 'settings'
	],

	'close/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'close'
	],

	// settings
	'settings/documents' => [
		'controller' => 'settings',
		'action' => 'documents'
	],
	'settings/create' => [
		'controller' => 'settings',
		'action' => 'create',
	]
];