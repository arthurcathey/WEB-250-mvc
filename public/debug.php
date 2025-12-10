<?php
// Debug script to understand path detection and environment

// Load .env file
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

echo "<h2>Path Detection Debug</h2>";
echo "<p><strong>REQUEST_URI:</strong> " . htmlspecialchars($_SERVER['REQUEST_URI'] ?? 'NOT SET') . "</p>";
echo "<p><strong>SCRIPT_NAME:</strong> " . htmlspecialchars($_SERVER['SCRIPT_NAME'] ?? 'NOT SET') . "</p>";
echo "<p><strong>SCRIPT_FILENAME:</strong> " . htmlspecialchars($_SERVER['SCRIPT_FILENAME'] ?? 'NOT SET') . "</p>";
echo "<p><strong>PHP_SELF:</strong> " . htmlspecialchars($_SERVER['PHP_SELF'] ?? 'NOT SET') . "</p>";

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
$path = '/' . ltrim(preg_replace('#^' . preg_quote($base, '#') . '#', '', $uri), '/');
if ($path === '//') {
  $path = '/';
}

echo "<p><strong>Parsed URI (without query):</strong> " . htmlspecialchars($uri) . "</p>";
echo "<p><strong>Base (dirname of SCRIPT_NAME):</strong> " . htmlspecialchars($base) . "</p>";
echo "<p><strong>Extracted Path:</strong> " . htmlspecialchars($path) . "</p>";

echo "<h2>Environment Variables</h2>";
echo "<p><strong>.env file exists:</strong> " . (file_exists($envFile) ? 'YES' : 'NO') . "</p>";
echo "<p><strong>.env file path:</strong> " . htmlspecialchars($envFile) . "</p>";
echo "<p><strong>DB_HOST:</strong> " . htmlspecialchars($_ENV['DB_HOST'] ?? 'NOT SET') . "</p>";
echo "<p><strong>DB_NAME:</strong> " . htmlspecialchars($_ENV['DB_NAME'] ?? 'NOT SET') . "</p>";
echo "<p><strong>DB_USER:</strong> " . htmlspecialchars($_ENV['DB_USER'] ?? 'NOT SET') . "</p>";
echo "<p><strong>DB_PASS:</strong> " . (isset($_ENV['DB_PASS']) ? '***' : 'NOT SET') . "</p>";
echo "<p><strong>DB_CHARSET:</strong> " . htmlspecialchars($_ENV['DB_CHARSET'] ?? 'NOT SET') . "</p>";

echo "<h2>Database Connection Test</h2>";
try {
  require_once __DIR__ . '/../config/db_credentials.php';
  require_once __DIR__ . '/../src/Database.php';

  $pdo = Database::getConnection();
  echo "<p style='color: green;'><strong>✓ Database connection successful!</strong></p>";

  // Try to query salamanders
  $stmt = $pdo->query("SELECT COUNT(*) as count FROM salamanders");
  $result = $stmt->fetch();
  echo "<p><strong>Salamanders in database:</strong> " . htmlspecialchars($result['count']) . "</p>";
} catch (Exception $e) {
  echo "<p style='color: red;'><strong>✗ Database connection failed!</strong></p>";
  echo "<p><strong>Error:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
}
