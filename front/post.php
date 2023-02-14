<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../css/style-post.css">
</head>

<body>
    <header id="main-header">
        <div class="row-limit-size">
            <div id="logo"><a href="../index.php">Blog</a></div>
            <nav>
                <ul>
                    <li><a href="../index.php">Accueil</a></li>
                    <li id="cat-menu"><a href="#">Catégories</a>
                        <ul id="cat-sub-menu">
                            <li><a href="../categories.php?id=<?=1?>">Musique</a></li>
                            <li><a href="../categories.php?id=<?=2?>">Cinéma</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Top posts</a></li>
                    <li><a href="../front/ramdom.php">Ramdom post</a></li>
                    <li><a href="../admin/insert.php">New post</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
<section>
    
<?php
include_once '../connexion.php';
$id = $_GET['id'];
$reqpost = $db->prepare("SELECT `id`, `title`, `content`, `thumbnail` FROM post WHERE `id` = :id");
$reqpost->bindParam('id', $id, PDO::PARAM_INT);
$reqpost->execute();
while ($reqFetchpost = $reqpost->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <article class="articles row-limit-size">
        <h1><?= $reqFetchpost['title'] ?></h1>
            <figure>
                <img src="../img/<?= $reqFetchpost['thumbnail'] ?>" alt="$reqFetchpost['title']">
            </figure>
            <div class="article-content">
                <p><?= $reqFetchpost['content'] ?></p>
            </div>
        </article>
    <?php } ?>
</section>
</main>