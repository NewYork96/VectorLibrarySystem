<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*

foreach ($books as $book) {
    var_dump($book );
    echo '<br>';
};

var_dump($_POST)
*/
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title>Vector Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="bg-light">

<div class="container py-5">
  <h1 class="mb-4">📋 Feladatlista</h1>

  <!-- Nézetváltó gombok -->
  <div class="mb-4">
    <button class="btn btn-outline-primary me-2" onclick="showView('list')">📋 Lista</button>
    <button class="btn btn-outline-secondary" onclick="showView('create')">➕ Új feladat</button>
  </div>

  <!-- Lista nézet -->
  <div id="view-list" style="display: block;">
    <ul id="task-list"></ul>
  </div>

  <!-- Létrehozás nézet -->
  <div id="view-create" style="display: none;">
    <form id="task-form" name="task-form" class="row g-3 mb-4">
      <div class="col-md-6">
        <input type="text" name="description" class="form-control" placeholder="Feladat leírása" onsubmit="return validateDescription()" required>
      </div>
      <div class="col-md-4">
        <input type="date" name="deadline" class="form-control" onsubmit="return validateDeadline()" required>
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">➕ Hozzáadás</button>
      </div>
    </form>
  </div>
</div>

<script src="/app/app.js"></script>
</body>
</html>
