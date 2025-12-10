<?php
// src/Controllers/SalamanderController.php
//
// The Controller receives a request (from the router),
// asks the Model for data, and then chooses a View to display.
require_once __DIR__ . '/../Models/Salamander.php';

class SalamanderController
{
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
    // Validate ID: must be numeric and > 0
    if (!is_numeric($id) || $id <= 0) {
      http_response_code(400);
      echo '<h1>400 Bad Request</h1>';
      echo '<p>Invalid salamander ID.</p>';
      echo '<p><a href="/WEB-250-mvc/web250-mvc/public/salamanders">Back to list</a></p>';
      return;
    }

    // Fetch the salamander
    $salamander = Salamander::find($id);

    // Handle not found
    if (!$salamander) {
      http_response_code(404);
    }

    require __DIR__ . '/../Views/salamanders/show.php';
  }

  /**
   * Show edit form for a salamander by ID.
   * 
   * @param int $id The salamander ID (must be > 0)
   */
  public function edit(int $id): void
  {
    // Validate ID: must be numeric and > 0
    if (!is_numeric($id) || $id <= 0) {
      http_response_code(400);
      echo '<h1>400 Bad Request</h1>';
      echo '<p>Invalid salamander ID.</p>';
      echo '<p><a href="/WEB-250-mvc/web250-mvc/public/salamanders">Back to list</a></p>';
      return;
    }

    // Fetch the salamander
    $salamander = Salamander::find($id);

    // Handle not found
    if (!$salamander) {
      http_response_code(404);
    }

    require __DIR__ . '/../Views/salamanders/edit.php';
  }

  /**
   * Show delete confirmation for a salamander by ID.
   * 
   * @param int $id The salamander ID (must be > 0)
   */
  public function delete(int $id): void
  {
    // Validate ID: must be numeric and > 0
    if (!is_numeric($id) || $id <= 0) {
      http_response_code(400);
      echo '<h1>400 Bad Request</h1>';
      echo '<p>Invalid salamander ID.</p>';
      echo '<p><a href="/WEB-250-mvc/web250-mvc/public/salamanders">Back to list</a></p>';
      return;
    }

    // Fetch the salamander
    $salamander = Salamander::find($id);

    // Handle not found
    if (!$salamander) {
      http_response_code(404);
    }

    require __DIR__ . '/../Views/salamanders/delete.php';
  }
}
