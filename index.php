<?php
require "./db.php";
$pdo = new PDO(DSN, USER, PASS);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les formulaires</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    

    <h1>Mes histoires</h1>
    <a href="/create.php">add a story</a>
    <section>
        <?php 
            $query = "SELECT * FROM story";
            $statement = $pdo->query($query);
            $stories = $statement->fetchAll();
        ?>
        <?php foreach($stories as $story): ?>    
            <article>
                <h1><?=$story["title"]?></h1>
                <p><?=$story["content"]?></p>
                <p><small><?=$story["author"]?></small></p>
            </article>
        <?php endforeach; ?>
        
    </section>
</body>

</html>