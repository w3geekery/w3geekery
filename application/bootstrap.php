<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/kohana/core'.EXT;

if (is_file(APPPATH.'classes/kohana'.EXT))
{
    // Application extends the core
    require APPPATH.'classes/kohana'.EXT;
}
else
{
    // Load empty core extension
    require SYSPATH.'classes/kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('America/Chicago');

/**
 * Set the default locale.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

Session::$default = 'database';

Kohana::$config = new Config;
Kohana::$config->attach(new Config_File);


/**
 * Set the default language
 */
I18n::lang('en-us');

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
    Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * Initialize Kohana, setting the default options.
 */
Kohana::init(Kohana::$config->load('init')->as_array());


/**
* Cookie
*/
Cookie::$salt = Kohana::$config->load('w3geekery.cookie_salt');
Cookie::$expiration = Kohana::$config->load('w3geekery.cookie_lifetime');
Cookie::$path = '/';
Cookie::$domain = '.w3geekery.com';
Cookie::$secure = FALSE;

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));
Log::$write_on_add=TRUE;
/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);


/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(Kohana::$config->load('modules')->as_array());


/**
 * Include default routes. Default routes are located in application/routes/default.php
 */
include Kohana::find_file('routes', 'default');

/**
 * Include the routes for the current environment.
 */

/*
if ($routes = Kohana::find_file('routes', Kohana::$environment))
{
    include $routes;
}
*/

