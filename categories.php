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
                            <li><a href="./categories.php?id=<?=1?>">Musique</a></li>
                            <li><a href="./categories.php?id=<?=2?>">Cinéma</a></li>
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
        <?php include_once 'connexion.php'; ?>
        <section>
        <?php
        $id = $_GET['id'];
        $reqtitle = $db->prepare("SELECT `name` FROM `category` WHERE `id` = :id");
        $reqtitle->bindParam('id', $id, PDO::PARAM_INT);
        $reqtitle->execute();
        $category = $reqtitle->fetch(PDO::FETCH_ASSOC)
    ?>
                <h1>Articles de catégorie <?= $category['name'] ?></h1>
            <div class="articles row-limit-size">
                <?php
                $reqpost = $db->prepare("SELECT `title`,`extract`,`thumbnail`, `id` FROM `post` INNER JOIN `post_category` ON `post_category`.`id_post`=`post`.`id`WHERE `post_category`.`id_category`= :id");
                $reqpost->bindParam('id', $id, PDO::PARAM_INT);
                $reqpost->execute();
                while ($article = $reqpost->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <article>
                        <figure>
                            <img src="./img/<?= $article['thumbnail'] ?>" alt="$article['title']">
                        </figure>
                        <div class="article-content">
                            <h2 class="article-title"><?= $article['title'] ?></h2>
                            <p class="article-extract"><?= $article['extract'] ?></p>
                            <p id="artplus"><a href="./front/post.php?id=<?= $article['id'] ?>">Lire l'article</a></p>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </section>
    </main>
</body>

</html>