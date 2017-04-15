<?php

/**
 *
 */
class Router
{

  /**
  * Таблица маршрутов
  * @var array
  */
  protected static $routes = [];

  /**
  * Текущий маршрут
  * @var array
  */
  protected static $route = [];

  /**
  * Добавляет маршрут в таблицу маршрутов
  * @param string $regexp регулярное выражение маршрута
  * @param array $route маршрут ([controller, action, params])
  */
  public static function add($regexp, $route = [])
  {
    self::$routes[$regexp] = $route;
  }

  /**
  * Возвращает таблицу маршрутов
  * @return array
  */
  public static function getRoutes()
  {
    return self::$routes;
  }

  /**
  * Возвращает текущий маршрут (controller, action, [params])
  * @return array
  */
  public static function getRoute()
  {
    return self::$route;
  }

  /**
  * Перебираем все маршруты в массиве $routes
  * При совподении помещаем текущий марщрут в массив $route и возвращаем true
  * @param string $url входящий url
  * @return boolean
  */
  public static function matchRoute($url)
  {
    foreach (self::$routes as $pattern => $route) {
      if (preg_match("#$pattern#i", $url, $matches)) {
        debug($matches);
        self::$route = $route;
        return true;
      }
    }
    return false;
  }

  /**
  *
  */
  public static function dispatch($url)
  {
    if (self::matchRoute($url)) {
      http_response_code(200);
      echo 'OK';
    } else {
      http_response_code(404);
      echo '404';
    }
  }
}
