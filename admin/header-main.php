<?php
session_start();

if (!isset($_SESSION['id-user'])) {
    header('Location: ../front/connect.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style-admin-cours.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <div id="logo">CMS Blog</div>
        <nav id="menu-main">
            <ul>
                <li><a href="./list-post.php">Articles</a>
                    <ul>
                        <li><a href="#">Nouvel article</a></li>
                        <li><a href="#">Listes des articles</a></li>
                    </ul>
                </li>
                <li><a href="#">Catégories</a></li>
                <li><a href="#">Mots-clés</a></li>
                <li><a href="#">Users</a></li>
            </ul>
        </nav>
    </header>
    <main>