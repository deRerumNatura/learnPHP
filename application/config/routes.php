<?php
// правила рутинга:
// обязательно controller и action (это метод класса)
// 
return [
	'' => [
		'controller' => 'main',
		'action' => 'index'
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
	'account/enter' => [
		'controller' => 'account',
		'action' => 'enter'
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
	],
	'news/showAll' => [
		'controller' => 'news',
		'action' => 'showAll'
	],
    /*
     * __ADMIN__
     */
    'admin' => [
        'controller' => 'admin',
        'action' => 'index'
    ],
    'admin/news' => [
        'controller' => 'adminnews',
        'action' => 'index'
    ],
    'adminnews/create' => [
        'controller' => 'adminnews',
        'action' => 'create'
    ],
    'adminnews/update' => [
        'controller' => 'adminnews',
        'action' => 'update'
    ],
    'adminnews/delete' => [
        'controller' => 'adminnews',
        'action' => 'delete'
    ],
    'adminnews/image' => [
        'controller' => 'adminnews',
        'action' => 'insertImage'
    ],
    /*
     * __FORUM__
     */
    'forum' => [
        'controller' => 'forum',
        'action' => 'showTopics'
    ],
    'forum/showone' => [
        'controller' => 'forum',
        'action' => 'showOneTopic'
    ],
    'forum/add' => [
        'controller' => 'forum',
        'action' => 'addTopic'
    ],
    /*
     * __MESSAGES__
     */
    'message/add' => [
        'controller' => 'message',
        'action' => 'add'
    ],

];