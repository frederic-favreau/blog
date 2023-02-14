<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramdom post</title>
    <link rel="stylesheet" href="../css/style-post.css">
</head>

<body>

    <body>
        <header id="main-header">
            <div class="row-limit-size">
                <div id="logo"><a href="../index.php">Blog</a></div>
                <nav>
                    <ul>
                        <li><a href="../index.php">Accueil</a></li>
                        <li id="cat-menu"><a href="#">Catégories</a>
                            <ul id="cat-sub-menu">
                                <li><a href="../categories.php?id=<?= 1 ?>">Musique</a></li>
                                <li><a href="../categories.php?id=<?= 2 ?>">Cinéma</a></li>
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
                <div class="articles row-limit-size">
                    <?php
                    include_once '../connexion.php';
                    $sql = "SELECT `id`, `title`, `content`, `thumbnail` FROM post ORDER BY RAND() LIMIT 1;";
                    $req = $db->query($sql);
                    while ($article = $req->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <article class="articles row-limit-size">
                            <h1><?= $article['title'] ?></h1>
                            <figure>
                                <img src="../img/<?= $article['thumbnail'] ?>" alt="$reqFetchpost['title']">
                            </figure>
                            <div class="article-content">
                                <p><?= $article['content'] ?></p>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </section>
        </main>

    </body>

</html>