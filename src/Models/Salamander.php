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

  /**
   * Create a new salamander in the database.
   * 
   * @param string $name The salamander name
   * @param string $habitat The salamander habitat
   * @param string $description The salamander description
   * @return int The ID of the newly created salamander, or 0 on failure
   */
  public static function create(string $name, string $habitat, string $description): int
  {
    try {
      $pdo = Database::getConnection();
      $sql = "INSERT INTO salamanders (name, habitat, description) VALUES (:name, :habitat, :description)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        ':name' => $name,
        ':habitat' => $habitat,
        ':description' => $description
      ]);
      return (int) $pdo->lastInsertId();
    } catch (Exception $e) {
      return 0;
    }
  }
}
