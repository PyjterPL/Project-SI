<?php
require_once('../connection.php');
require_once('../article_class.php');

session_start();
$article = new Article;
if(isset($_GET['id']) && isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{
    if(isset($_POST['title']) && isset($_POST['introduction']) && isset($_POST['content']) && isset($_POST['tags']))
    {
    $title = $_POST['title'];
    $introduction = $_POST['introduction'];
    $content = $_POST['content'];
    $tags = $_POST['tags'];
    $userID= $_SESSION['UserID'];
    $categoryID=1;
    $id = $_GET['id'];

        if(empty($title) or empty($introduction) or empty($content) or empty($tags))
        {
            $error="Uzupełnij wymagane pola";
            header("Location: article-edit.php?error=$error");
            exit();
        }
    $query=$pdo->prepare('UPDATE articles SET CategoryID=?, UserID=?,Title=?,Introduction=?,Tags=?,Content=? WHERE ArticleID=?');
    $query->bindValue(1, $categoryID);
    $query->bindValue(2, $userID);
    $query->bindValue(3, $title);
    $query->bindValue(4, $introduction);
    $query->bindValue(5, $tags);
    $query->bindValue(6, $content);
    $query->bindValue(7, $id);
    $query->execute();
    header('Location: articles-options.php');
    exit();
    }
}
else
{
    header('Location: ../index.php');
    exit();
}
?>