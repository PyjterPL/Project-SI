<?php
require_once('../connection.php');
require_once('../article_class.php');
$article = new Article;
$articles = $article->fetch_all();
session_start();
if(isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{ ?>



<html>
<head>
    <title>CMS</title>
    <link rel="stylesheet" href="admin-panel-style.css" /> 
</head>
<body>
    <div class="container">
<a href="../index.php" id="logo">Strona glowna</a>
</br>
<a href="admin-panel.php" id="logo">CMS</a>
</br>
<a href="article-add.php" id="logo">Dodaj nowy artykuł</a>
    <ol>
        <?php foreach($articles as $article) { ?>
        <li>
            <a href="article-edit.php?id=<?php echo $article['ArticleID']; ?>">
            <?php echo $article['Title']; ?>
            </a>
            - <small>
              dodano <?php echo date("Y-m-d H:i:s",strtotime($article['InsertDate'])); ?>
            </small>
            <a href="article-delete.php?id=<?php echo $article['ArticleID']; ?>">
            Usuń</a>
            <a href="article-edit.php?id=<?php echo $article['ArticleID']; ?>">
             Edytuj</a>
        <?php } ?>
    </ol>
    </div>
</body>
</html>
        <?php }
else
{
    header('Location: ../index.php');
    exit();
}
?>
