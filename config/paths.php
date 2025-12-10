<?php

declare(strict_types=1);

/**
 * Dynamic base path configuration for multi-environment support
 * 
 * This file determines the correct base path for URLs based on where
 * the application is deployed (local development vs. subdirectory on webserver)
 */

// Get the script directory (e.g., /WEB-250-mvc/web250-mvc/public)
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);

// Remove trailing slash for consistency
$basePath = rtrim($scriptDir, '/');

// If basePath is empty or just '/', it's at domain root
if (empty($basePath) || $basePath === '') {
  $basePath = '';
}

return [
  'BASE_PATH' => $basePath,
];
