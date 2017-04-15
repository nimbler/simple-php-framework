<?php

namespace app\controllers;

/**
 *
 */
class PostsNew extends \vendor\core\base\Controller
{

  function indexAction()
  {
    echo "PostsNew::index";
  }

  function testAction()
  {
    echo "PostsNew::test";
  }

  function testPageAction()
  {
    echo "PostsNew::testPage";
  }

  function before()
  {
    echo "PostsNew::before";
  }

}
