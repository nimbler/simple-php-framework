<?php

echo $query = rtrim($_SERVER['QUERY_STRING'], '/');

require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';

// Правила маршрутизации по умолчанию
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?', []);

debug(Router::getRoutes());

if (Router::matchRoute($query)) {
  debug(Router::getRoute());
} else {
  echo "404";
}
