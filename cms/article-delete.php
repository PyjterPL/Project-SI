<?php
require_once('../connection.php');
require_once('../article_class.php');

session_start();
$article = new Article;
if(isset($_GET['id']) && isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{
    $id = $_GET['id'];
    $article->delete_article($id);
     header('Location: articles-options.php');
   // echo "usunieto";
     exit();
}
else
{
    header('Location: ../index.php');
    exit();
}
?>