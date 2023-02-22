<?php
require_once '../connexion.php';
$id = $_GET['id'];
$reqdel = $db->prepare("DELETE FROM `post` WHERE `id` = :id");
$reqdel->bindParam('id', $id, PDO::PARAM_INT);
$reqdel->execute();

header('Location: ./list-post.php?delete=success');
exit();
?>