<?php

declare(strict_types=1);

// Always show errors for debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Web250\Mvc\Router;
use Web250\Mvc\Controllers\HomeController;

require __DIR__ . '/../vendor/autoload.php';

// Manually load .env file without using Dotenv library
$envFile = dirname(__DIR__) . '/.env';
if (file_exists($envFile)) {
  $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  foreach ($lines as $line) {
    if (strpos(trim($line), '#') === 0) continue;
    if (strpos($line, '=') !== false) {
      list($name, $value) = explode('=', $line, 2);
      $name = trim($name);
      $value = trim($value);
      $_ENV[$name] = $value;
      $_SERVER[$name] = $value;
      putenv("$name=$value");
    }
  }
}

require_once __DIR__ . '/../src/Controllers/SalamanderController.php';

// CREATE AND CONFIGURE THE ROUTER
$router = new Router();

$router->get('/', fn() => (new HomeController())->index());
$router->get('/home', fn() => (new HomeController())->index());
$router->get('/about', fn() => (new HomeController())->about());
$router->get('/contact', fn() => (new HomeController())->contact());
$router->get('/salamanders', function () {
  $controller = new SalamanderController();
  $controller->index();
});
$router->get('/salamanders/show', function () {
  $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
  $controller = new SalamanderController();
  $controller->show($id);
});
$router->get('/salamanders/edit', function () {
  $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
  $controller = new SalamanderController();
  $controller->edit($id);
});
$router->get('/salamanders/delete', function () {
  $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
  $controller = new SalamanderController();
  $controller->delete($id);
});
$router->get('/salamanders/create', function () {
  $controller = new SalamanderController();
  $controller->create();
});

// DETERMINE THE CURRENT REQUEST METHOD AND PATH
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
$path = '/' . ltrim(preg_replace('#^' . preg_quote($base, '#') . '#', '', $uri), '/');
if ($path === '//') {
  $path = '/';
}

// ASK THE ROUTER TO HANDLE THE REQUEST
$router->dispatch($method, $path);
