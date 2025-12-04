<?php
// src/Models/Salamander.php
//
// The Model contains all the database logic for salamanders.
require_once __DIR__ . '/../Database.php';

class Salamander
{
  /**
   * Get all salamanders from the database.
   */
  public static function all(): array
  {
    $pdo = Database::getConnection();
    $sql = "SELECT id, name, habitat, description FROM salamanders ORDER BY name ASC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
  }

  /**
   * Find a single salamander by ID.
   */
  public static function find(int $id): ?array
  {
    $pdo = Database::getConnection();
    $sql = "SELECT id, name, habitat, description FROM salamanders WHERE id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetch();
    return $result ?: null;
  }
}
