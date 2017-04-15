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
        foreach ($matches as $key => $value) {
          if (is_string($key)) {
            $route[$key] = $value;
          }
        }
        if (!isset($route['action'])) {
          $route['action'] = 'index';
        }
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
      $controller = self::upperCamelCase(self::$route['controller']);
      self::upperCamelCase($controller);
      if (class_exists($controller)) {
        $cObj = new $controller;
      } else {
        echo "Контроллер <b>$controller</b> не найден";
      }
    } else {
      http_response_code(404);
      echo '404';
    }
  }

  /**
  * Приводим имя контроллера к нормальному виду
  * @param string $name
  * @return string
  */
  protected static function upperCamelCase($name)
  {
    $name = str_replace('-', ' ', $name);
    $name = ucwords($name);
    $name = str_replace(' ', '', $name);
    return $name;
  }
}
