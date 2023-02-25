<?php
include_once './header-main.php';
require_once '../connexion.php';
?>

<h1>Listes des articles</h1>
<div id="list-posts">
    <?php
    $sql = "SELECT `title`, `id` FROM `post`   ORDER BY `id` DESC;";
    $req = $db->query($sql);
    while ($article = $req->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div id="post">
            <h2><?= $article['title'] ?></h2>
            <div id="edit">
                <a href="./edit.php?id=<?= $article['id'] ?>" class="edit-article">Editer</a>
                <span>|</span>
                <a href="#" class="delete-article"  data-titre="<?= $article['title'] ?>" data-id="<?= $article['id'] ?>">Supprimer</a>
            </div>
        </div>

    <?php
    }
    ?>

<div class="bloc-modale"></div>

<?php if(isset($_SESSION['success'])): ?> 
    <div id="confirmed-delete">
        <p><?= $_SESSION["success"] ?></p>
    </div>
    <?php unset($_SESSION["success"]); ?>
<?php endif; ?>

<?php if(isset($_SESSION['error'])): ?>
    <div id="confirmed-error">
        <p><?= $_SESSION["error"] ?></p>
    </div>
    <?php unset($_SESSION["error"]); ?>
<?php endif; ?>








</main>

<script src="../mainFull.js"></script>
</body>

</html>