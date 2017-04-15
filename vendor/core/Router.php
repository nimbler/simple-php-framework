<?php

/**
 *
 */
class Router
{

  protected static $routes = [];  // массив таблицы маршрутов
  protected static $route = [];   // текущий маршрут

  public static function add($regexp, $route = [])
  {
    self::$routes[$regexp] = $route;
  }

  public static function getRoutes()
  {
    return self::$routes;
  }

  public static function getRoute()
  {
    return self::$route;
  }

  /**
  * Перебираем все маршруты в массиве $routes
  * При совподении помещаем текущий марщрут в массив $route и возвращаем true
  */
  public static function matchRoute($url)
  {
    foreach (self::$routes as $pattern => $route) {
      if ($url == $pattern) {
        self::$route = $route;
        return true;
      }
    }
    return false;
  }
}
