<?php
require "./db.php";
$pdo = new PDO(DSN, USER, PASS);
$errors = [];
if (!empty($_POST)) {
    $story = array_map('trim', $_POST);
    $story = array_map('htmlentities', $story);
    $title = $story["title"];
    $author = $story["author"];
    $content = $story["content"];

    //analyse des valeurs, vérification des erreurs, etc.

    if (empty($errors)) {
        $query = "INSERT INTO story (title, content, author) VALUES (:title, :content, :author)";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':content', $content);
        $statement->bindValue(':author', $author);
        $statement->execute();
        header("Location: /");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<form action="" method="POST" >
        <h1>Add a story</h1>
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" >
        </div>
        <div>
            <label for="author">Author</label>
            <input type="text" name="author" id="author">
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" rows="10"></textarea>
        </div>
        <!-- <button type="reset">Submit</button> -->
        <input type="submit" value="Add">
    </form>

    
</body>
</html>