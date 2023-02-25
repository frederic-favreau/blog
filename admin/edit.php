<?php
require_once '../connexion.php';
include_once './header-main.php';
?>

<section id="section-edition">

    <?php
    try {
        $id = $_GET['id'];
        if (isset($_POST['submit'])) {
            $title = addslashes($_POST['title']);
            $extract = addslashes($_POST['extract']);
            $content = addslashes($_POST['content']);

            $reqredit = $db->prepare("UPDATE `post` SET `title`='$title',`extract`='$extract',`content`='$content' WHERE `id` = :id");
            $reqredit->bindParam('id', $id, PDO::PARAM_INT);
            $reqredit->execute();

            $_SESSION["modified"] = "Votre article a bien été modifié";
            header("Location: edit.php?id=" . $id);
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION["notModified"] = "Votre article n'a pas été modifié";
        header("Location: edit.php?id=" . $id);
        exit();
    }
    ?>

    <?php

    $reqedit = $db->prepare("SELECT `title`, `extract`,`content` FROM `post` WHERE `id` = :id");
    $reqedit->bindParam('id', $id, PDO::PARAM_INT);
    $reqedit->execute();
    while ($edit = $reqedit->fetch(PDO::FETCH_ASSOC)) {
    ?>

        <form action="#" method="POST">
            <fieldset>
                <legend>Ton futur article</legend>
                <div>
                    <label for="title">Titre de ton article</label>
                    <input type="text" name="title" id="title" maxlength="50" value="<?= $edit['title'] ?>">
                </div>
                <div>
                    <label for="extract">Description de ton article</label>
                    <textarea name="extract" id="extract" cols="90" rows="10"><?= $edit['extract'] ?></textarea>
                </div>
                <div>
                    <label for="content">Contenu de ton poste</label>
                    <textarea name="content" id="content" cols="120" rows="20" maxlength="4000"><?= $edit['content'] ?></textarea>
                </div>
            </fieldset>
            <fieldset>
                <legend>Reset / Poster</legend>
                <input class="btn-form" type="reset" name="reset" value="Reset">
                <input class="btn-form" type="submit" name="submit" value="Poster">
            </fieldset>
        </form>
    <?php } ?>
</section>

<?php if(isset($_SESSION['modified'])): ?> 
    <div id="confirmed-modified">
        <p><?= $_SESSION["modified"] ?></p>
    </div>
    <?php unset($_SESSION["modified"]); ?>
<?php endif; ?>

<?php if(isset($_SESSION['notModified'])): ?> 
    <div id="not-modified">
        <p><?= $_SESSION["notModified"] ?></p>
    </div>
    <?php unset($_SESSION["notModified"]); ?>
<?php endif; ?>

</main>
</body>

</html>