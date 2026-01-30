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
  <h1 class="mb-4">Feladatlista</h1>
  <ul id="bookList"></ul>

<script src="/app/app.js"></script>
</body>
</html>
