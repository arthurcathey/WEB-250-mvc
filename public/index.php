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
$router->post('/salamanders/store', function () {
  $controller = new SalamanderController();
  $controller->store();
});
$router->post('/salamanders/update', function () {
  $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
  $controller = new SalamanderController();
  $controller->update($id);
});
$router->post('/salamanders/destroy', function () {
  $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
  $controller = new SalamanderController();
  $controller->destroy($id);
});

// DETERMINE THE CURRENT REQUEST METHOD AND PATH
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

// Get the request URI
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';

// Strategy: Get the directory of index.php and use it as the base
// SCRIPT_NAME is the path to the current script (/path/to/public/index.php)
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '/index.php';

// Remove 'index.php' from the end to get the directory
$scriptDir = dirname($scriptName);

// Normalize the script directory (remove trailing slash if it exists)
$base = rtrim(str_replace('\\', '/', $scriptDir), '/');

// Remove the base directory from the URI to get only the route path
// For example: /WEB-250-mvc/web250-mvc/public/salamanders -> /salamanders
if ($base && $base !== '/' && strpos($uri, $base) === 0) {
  $path = substr($uri, strlen($base));
} else {
  $path = $uri;
}

// Ensure path starts with /
if (empty($path) || $path[0] !== '/') {
  $path = '/' . ltrim($path, '/');
}

// Handle edge case where path becomes '//'
if ($path === '//') {
  $path = '/';
}

// ASK THE ROUTER TO HANDLE THE REQUEST
$router->dispatch($method, $path);
