<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header id="main-header">
        <div class="row-limit-size">
            <div id="logo"><a href="../index.php">Blog</a></div>
            <nav>
                <ul>
                    <li><a href="../index.php">Accueil</a></li>
                    <li id="cat-menu"><a href="../categories.php">Catégories</a>
                        <ul id="cat-sub-menu">
                            <li><a href="../categories.php?id=<?= 1 ?>">Musique</a></li>
                            <li><a href="../categories.php?id=<?= 2 ?>">Cinéma</a></li>
                        </ul>
                    </li>
                    <li><a href="connect.php">Se connecter</a></li>
                    <li><a href="../front/ramdom.php">Ramdom post</a></li>
                    <li><a href="../admin/insert.php">New post</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section>
            <?php
            if (isset($_GET['err'])) {
            ?>
                <p style="color: red;">Pseudo ou mot de passe incorrect</p> <br>
            <?php
            }
            ?>
            <form action="../admin/auth.php" method="POST">
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo"><br><br>
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password"> <br><br>
                <input type="submit" name="submit" value="Se connecter">
            </form>
        </section>
    </main>
</body>