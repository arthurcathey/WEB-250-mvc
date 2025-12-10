<?php
// src/Database.php
//
// This class is responsible ONLY for creating and returning
// a PDO database connection. It does not know about models,
// controllers, or views. Keeping it separate makes it easier
// to reuse in many parts of the application.


class Database
{
  /**
   * Get a PDO connection to the salamander database.
   *
   * @return PDO  A configured PDO object ready for queries.
   */
  public static function getConnection(): PDO
  {
    $config = require __DIR__ . '/../config/db_credentials.php';
    $host = $config['host'];
    $db   = $config['dbname'];
    $user = $config['username'];
    $pass = $config['password'];
    $charset = $config['charset'] ?? 'utf8mb4';

    // Validate configuration
    if (empty($host) || empty($db) || empty($user)) {
      throw new Exception(
        "Database configuration incomplete. Check .env file and ensure DB_HOST, DB_NAME, and DB_USER are set.\n" .
        "Current: HOST=$host, DB=$db, USER=$user"
      );
    }

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    
    try {
      return new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
      throw new PDOException(
        "Failed to connect to database.\n" .
        "Host: $host\n" .
        "Database: $db\n" .
        "User: $user\n" .
        "Error: " . $e->getMessage(),
        (int)$e->getCode(),
        $e
      );
    }
  }
}
