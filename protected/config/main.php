<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Prescription Ordering System',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.wrest.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/**/
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'pos123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

	),

	// application components
	'components'=>array(
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					// Write to the logfile in the 'runtime' directory
					'class'=>'CFileLogRoute',
					'levels'=>'error',
                    'filter'=>'CLogFilter'
					// Do not specify levels or categories in order to capture all
				)
			)
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/**/
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				//rest url patterns
				array('api/<model>/delete', 'pattern'=>'api/<model:\w+>/<_id:\d+>', 'verb'=>'DELETE'),
				array('api/<model>/update', 'pattern'=>'api/<model:\w+>/<_id:\d+>', 'verb'=>'PUT'),
				array('api/<model>/list', 'pattern'=>'api/<model:\w+>', 'verb'=>'GET'),
				array('api/<model>/get', 'pattern'=>'api/<model:\w+>/<_id:\d+>', 'verb'=>'GET'),
				array('api/<model>/create', 'pattern'=>'api/<model:\w+>', 'verb'=>'POST'),
			),
		),


		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
