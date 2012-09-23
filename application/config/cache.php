<?php defined('SYSPATH') or die('No direct script access.');
return array
(
	'tweet'   => array
	(
		'driver'             => 'sqlite',
		'default_expire'     => 900,
		'database'           => APPPATH.'cache/tweet-cache.sql3',
		'schema'             => 'CREATE TABLE caches(id VARCHAR(127) PRIMARY KEY, tags VARCHAR(255), expiration INTEGER, cache TEXT)',
	),
);