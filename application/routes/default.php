<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
Route::set('autocomplete', 'autocomplete')
  ->defaults(array(
    'controller' => 'autocomplete',
    'action'     => 'index',
));

Route::set('examples', 'examples/<example>')
  ->defaults(array(
    'controller' => 'page',
    'action'     => 'index',
    'page'       => 'examples',
));

Route::set('static', '<page>')
  ->defaults(array(
    'controller' => 'page',
    'action'     => 'index',
    'page'       => 'home'
));

Route::set('default', '(<controller>(/<action>(/<id>)))')
  ->defaults(array(
    'controller' => 'page',
    'action' => 'index',
));

Route::set('error', 'error/<action>(/<message>)', array('action' => '[0-9]++', 'message' => '.+'))
  ->defaults(array(
    'controller' => 'error_handler'
));

