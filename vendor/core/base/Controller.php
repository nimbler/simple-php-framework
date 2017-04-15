<?php

namespace vendor\core\base;

/**
 *
 */
abstract class controller
{

  public $route = [];

  public function __construct($route)
  {
    $this->route = $route;
  }
}
