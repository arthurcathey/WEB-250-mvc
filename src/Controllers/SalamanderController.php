<?php
// src/Controllers/SalamanderController.php
//
// The Controller receives a request (from the router),
// asks the Model for data, and then chooses a View to display.
require_once __DIR__ . '/../Models/Salamander.php';

class SalamanderController
{
  /**
   * Validate that an ID is numeric and greater than 0.
   * Returns false and outputs error if invalid.
   * 
   * @param int $id The ID to validate
   * @return bool True if valid, false otherwise
   */
  private function validateId(int $id): bool
  {
    if (!is_numeric($id) || $id <= 0) {
      http_response_code(400);
      echo '<h1>400 Bad Request</h1>';
      echo '<p>Invalid salamander ID.</p>';
      echo '<p><a href="/WEB-250-mvc/web250-mvc/public/salamanders">Back to list</a></p>';
      return false;
    }
    return true;
  }

  /**
   * Fetch a salamander by ID and handle not found.
   * Sets 404 status if not found but doesn't exit.
   * 
   * @param int $id The salamander ID
   * @return array|null The salamander data or null if not found
   */
  private function fetchSalamander(int $id): ?array
  {
    $salamander = Salamander::find($id);
    if (!$salamander) {
      http_response_code(404);
    }
    return $salamander;
  }

  /**
   * Show a list of all salamanders.
   */
  public function index(): void
  {
    $salamanders = Salamander::all();
    require __DIR__ . '/../Views/salamanders/index.php';
  }

  /**
   * Show a single salamander by ID.
   * 
   * @param int $id The salamander ID (must be > 0)
   */
  public function show(int $id): void
  {
    if (!$this->validateId($id)) {
      return;
    }

    $salamander = $this->fetchSalamander($id);
    require __DIR__ . '/../Views/salamanders/show.php';
  }

  /**
   * Show edit form for a salamander by ID.
   * 
   * @param int $id The salamander ID (must be > 0)
   */
  public function edit(int $id): void
  {
    if (!$this->validateId($id)) {
      return;
    }

    $salamander = $this->fetchSalamander($id);
    require __DIR__ . '/../Views/salamanders/edit.php';
  }

  /**
   * Show delete confirmation for a salamander by ID.
   * 
   * @param int $id The salamander ID (must be > 0)
   */
  public function delete(int $id): void
  {
    if (!$this->validateId($id)) {
      return;
    }

    $salamander = $this->fetchSalamander($id);
    require __DIR__ . '/../Views/salamanders/delete.php';
  }

  /**
   * Show form to create a new salamander.
   */
  public function create(): void
  {
    require __DIR__ . '/../Views/salamanders/create.php';
  }

  /**
   * Store a new salamander in the database.
   * Expects POST data with name, habitat, and description.
   */
  public function store(): void
  {
    // Validate POST data
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      http_response_code(405);
      echo '<h1>405 Method Not Allowed</h1>';
      echo '<p>This endpoint only accepts POST requests.</p>';
      return;
    }

    // Get and validate form data
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $habitat = isset($_POST['habitat']) ? trim($_POST['habitat']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';

    // Validate all fields are filled
    if (empty($name) || empty($habitat) || empty($description)) {
      http_response_code(400);
      echo '<h1>400 Bad Request</h1>';
      echo '<p>All fields are required.</p>';
      echo '<p><a href="/WEB-250-mvc/web250-mvc/public/salamanders/create">Back to form</a></p>';
      return;
    }

    // Create the salamander
    $id = Salamander::create($name, $habitat, $description);

    // Check if creation was successful
    if ($id > 0) {
      // Redirect to the new salamander's show page
      header("Location: /WEB-250-mvc/web250-mvc/public/salamanders/show?id=$id");
      exit;
    } else {
      http_response_code(500);
      echo '<h1>500 Server Error</h1>';
      echo '<p>Failed to create salamander. Please try again.</p>';
      echo '<p><a href="/WEB-250-mvc/web250-mvc/public/salamanders/create">Back to form</a></p>';
      return;
    }
  }
}
