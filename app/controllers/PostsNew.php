<?php

namespace app\controllers;

/**
 *
 */
class PostsNew extends App
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
