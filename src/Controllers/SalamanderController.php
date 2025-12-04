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
   */
  public function show(int $id): void
  {
    $salamander = Salamander::find($id);
    require __DIR__ . '/../Views/salamanders/show.php';
  }
}
