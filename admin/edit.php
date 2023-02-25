<?php
require_once '../connexion.php';
include_once './header-main.php';
?>

<section id="section-edition">

    <?php
    $id = $_GET['id'];
    if (isset($_POST['submit'])) {
        $title = addslashes($_POST['title']);
        $extract = addslashes($_POST['extract']);
        $thumbnail = 'monimage.jpg';
        $content = addslashes($_POST['content']);

        $reqredit = $db->prepare("UPDATE `post` SET `title`='$title',`extract`='$extract',`content`='$content' WHERE `id` = :id");
        $reqredit->bindParam('id', $id, PDO::PARAM_INT);
        $reqredit->execute();
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
</main>