<?php

namespace app\controllers;

/**
 *
 */
class Page extends \vendor\core\base\Controller
{

  public function viewAction()
  {
    debug($this->route);
    echo "Page::view";
  }
}
