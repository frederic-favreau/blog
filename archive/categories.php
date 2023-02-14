<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header id="main-header">
        <div class="row-limit-size">
            <div id="logo"><a href="#">Blog</a></div>
            <nav>
                <ul>
                    <li><a href="./index.php">Accueil</a></li>
                    <li id="cat-menu"><a href="#">Catégories</a>
                        <ul id="cat-sub-menu">
                            <li><a href="#">Musique</a></li>
                            <li><a href="#">Cinéma</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Top posts</a></li>
                    <li><a href="./front/ramdom.php">Ramdom post</a></li>
                    <li><a href="./admin/insert.php">New post</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
    <?php
include_once '../connexion.php'; ?> 
        <section>
            <h1>Articles par catégories</h1>
            <div class="articles row-limit-size">
                <?php
                $sql = ("SELECT `title`,`extract`,`thumbnail` FROM `post` INNER JOIN `post_category` ON `post_category`.`id_post`=`post`.`id` WHERE `category`. `id_catégorie`= 1;");
                $req = $db->query($sql);
                while ($article = $req->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <article>
                        <figure>
                            <img src="./img/<?= $article['thumbnail'] ?>" alt="$article['title']">
                        </figure>
                        <div class="article-content">
                            <h2 class="article-title"><?= $article['title'] ?></h2>
                            <p class="article-extract"><?= $article['extract'] ?></p>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </section>
    </main>
</body>