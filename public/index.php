<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../src/api/getbooks.php';
require_once __DIR__ . '/../src/api/deletebook.php';

foreach ($books as $book) {
    var_dump($book );
    echo '<br>';
};

var_dump($_POST)
?>

<html>
    <body>

        <form method="post" action="<?php __DIR__ . '/../src/api/deletebook.php'?>">
            id: <input type="text" name="id">
            <input type="submit">
        </form>

    </body>
</html>

