<?php
session_start();
try {
    require_once '../connexion.php';
    $id = $_GET['id'];
    $reqdel = $db->prepare("DELETE FROM `post` WHERE `id` = :id");
    $reqdel->bindParam('id', $id, PDO::PARAM_INT);
    $reqdel->execute();
    $_SESSION["success"] = "Votre article a bien été supprimé";
    header('Location: ./list-post.php');
    exit();

} catch (PDOException $e) {
    $_SESSION["error"] = "Votre article n'a pas été supprimé";
    header('Location: ./list-post.php');
    exit();
}


