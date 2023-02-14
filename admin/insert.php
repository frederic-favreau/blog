<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'un post</title>
    <link rel="stylesheet" href="../css/style-admin.css">
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
        <?php
        include_once '../connexion.php';
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $extract = $_POST['extract'];
            $thumbnail = 'monimage.jpg';
            $content = $_POST['content'];
            $author = $_POST['author'];
            $sql = "INSERT INTO post(`title`, `extract`, `thumbnail`, `content`, `author` )VALUES ('$title','$extract','$thumbnail','$content', $author)";
            $db->query($sql);
        }
        ?>
        <section>
            <h1>Création d'article</h1>
            <form action="#" method="POST">
                <fieldset>
                    <legend>Ton futur article</legend>
                    <div>
                        <label for="title">Titre de ton article</label>
                        <input type="text" name="title" id="title" maxlength="50">
                    </div>
                    <div>
                        <label for="extract">Description de ton article</label>
                        <textarea name="extract" id="extract" cols="90" rows="10"></textarea>
                    </div>
                    <div>
                        <label for="content">Contenu de ton poste</label>
                        <textarea name="content" id="content" cols="120" rows="20" maxlength="250"></textarea>
                    </div>
                    <div>
                        <label for="author">Auteur</label>
                        <input type="text" name="author" id="author" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Reset / Poster</legend>
                    <input class="btn-form" type="reset" name="reset" value="Reset">
                    <input class="btn-form" type="submit" name="submit" value="Poster">
                </fieldset>
            </form>
        </section>
    </main>
</body>

</html>