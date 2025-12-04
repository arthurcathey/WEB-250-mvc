<?php

declare(strict_types=1);

namespace Web250\Mvc\Controllers;

use Web250\Mvc\Models\Greeting;

class HomeController
{
  public function index(): string
  {
    $model = new Greeting();
    $message = $model->hello();

    ob_start();
    include __DIR__ . '/../Views/home.php';
    return (string) ob_get_clean();
  }

  public function about(): string
  {
    ob_start();
    include __DIR__ . '/../Views/about.php';
    return (string) ob_get_clean();
  }

  public function contact(): string
  {
    ob_start();
    include __DIR__ . '/../Views/contact.php';
    return (string) ob_get_clean();
  }
}
