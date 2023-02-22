<?php
include_once './header-main.php';
require_once '../connexion.php';
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
                        <textarea name="content" id="content" cols="120" rows="20" maxlength="4000"></textarea>
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
