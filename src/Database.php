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

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    return new PDO($dsn, $user, $pass, $options);
  }
}
