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

  <div id="list">
    <h1 class="mb-4">Könvylista</h1>
    <ul id="bookList"></ul>
  </div>
  
  <div id="create">
    <form id="book-form" name="book-form" method="get">
      <label for="title">Cím: </label>
      <input type="text" name="title"><br><br>
      <label for="author">Író: </label>
      <input type="text"  name="author"><br><br>
          <label for="publishYear">Kiadás éve: </label>
      <input type="text"  name="publishYear"><br><br>
          <label for="isAvailable">Kölcsönözhető: </label>
      <input type="text"  name="isAvailable"><br><br>
      <input type="submit" value="Submit">
    </form>  
  </div>

  <button>Új könyv regisztrálása</button>

<script src="/app/app.js"></script>
</body>
</html>
