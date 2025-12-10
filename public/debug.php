<?php
// Debug script to understand path detection
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
?>
