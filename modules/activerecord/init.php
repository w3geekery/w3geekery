<?php defined('SYSPATH') or die('No direct script access.');
/**
 * [PHP-ActiveRecord][ref-arm] integration for Kohana Framework.
 *
 * [ref-arm]: http://phpactiverecord.org
 * 
 * @package    Arm
 * @author     Devi Mandiri <devi.mandiri@gmail.com>
 * @copyright  (c) 2011 Devi Mandiri
 * @license    MIT
 */
define('PHP_ACTIVERECORD_AUTOLOAD_PREPEND', false);

include Kohana::find_file('vendor', 'activerecord/ActiveRecord');

ActiveRecord\Config::initialize(function($cfg)
{
    $db = Kohana::$config->load('activerecord');
	$cfg->set_model_directory($db->model);
	$cfg->set_connections(array('development' => $db->dsn ));	
});

