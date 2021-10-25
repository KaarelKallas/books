<?php

require_once 'connection.php';
$bookId = $_GET['id'];
$stmt = $pdo ->prepare ('SELECT * FROM books b LEFT JOIN book_authors ba ON b.id=ba.book_id LEFT JOIN authors a ON a.id=ba.author_id WHERE b.id=:id');

$stmt-> execute([':id' => $_GET['id']]);
$book = $stmt->fetch();
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <p>Raamatu nimi: <?php echo $book['title']; ?></p>
    <p>Väljalaske aasta: <?php echo $book['release_date']; ?></p>
    <p>Autor: <?php echo $book['first_name']; ?> <?php echo $book['last_name']; ?></p>
    <p>Hind: <?php echo $book['price']; ?></p>
    <a href="edit.php?id=<?=$bookId?>">
        EDIT
    </a>
    <a href="delete.php?id=<?=$bookId?>">DELETE</a>
    </body>




</html>
