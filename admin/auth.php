<?php 
session_start();

require_once '../connexion.php';

$pseudo = $_POST['pseudo'];
$pass = $_POST['password'];

$req = $db->prepare("SELECT `id`,`pseudo`, `password` FROM `user` WHERE `pseudo` = :pseudo");
$req->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
$req->execute();

if($req->rowCount() == 1){
    $user = $req->fetch(PDO::FETCH_ASSOC);

    if($user['password'] === $pass){
        $_SESSION['id-user'] = $user['id'];
        header('Location: ./dashboard.php');
    } else {
        header('Location: ../front/connect.php?err=1');
    }
} else {
    header('Location: ../front/connect.php?err=1');
}
