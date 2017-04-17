<?php

use vendor\core\Router;

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('LAYOUT', 'default');

$query = $_SERVER['QUERY_STRING'];

require '../vendor/libs/functions.php';

spl_autoload_register(function ($class)
{
  $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
  if (is_file($file)) {
    require_once $file;
  }
});

Router::add('^page/?(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

// Правила маршрутизации по умолчанию
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', []);

Router::dispatch($query);
