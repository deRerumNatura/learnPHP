<?php
// правила рутинга:
// обязательно controller и action (это метод класса)
// 
return [
	'' => [
		'controller' => 'main',
		'action' => 'index'
	],
	'main/admin' => [
		'controller' => 'main',
		'action' => 'admin'
	],
	'account/login' => [
		'controller' => 'account',
		'action' => 'login'
	],
	'account/logout' => [
		'controller' => 'account',
		'action' => 'logout'
	],
	'account/dashboard' => [
		'controller' => 'account',
		'action' => 'dashboard'
	],
	'account/register' => [
		'controller' => 'account',
		'action' => 'register'
	],
	'news' => [
		'controller' => 'news',
		'action' => 'show'
	],
	'news/show' => [
		'controller' => 'news',
		'action' => 'show'
	],
	'news/showOne' => [
		'controller' => 'news',
		'action' => 'showOne'
	]
];