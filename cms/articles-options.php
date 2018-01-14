<?php
require_once('../connection.php');
require_once('../article_class.php');
$article = new Article;
$articles = $article->fetch_all();
session_start();
?>

<html lang="pl">
<head>
    <title>CMS</title>
    <link rel="stylesheet" href="../CSS/Login.css" /> 
    <meta charset = "utr-8"/>
</head>
    
<body>
    
    <div id="art_nav">
        <form>
    <input type="button" value="Strona Główna" onclick="window.location.href='../index.php'" />
        
    <input type="button" value="Dodaj Artykuł" onclick="window.location.href='article-add.php'" />
            
    <input type="button" value="Panel Administratora" onclick="window.location.href='admin-panel.php'" />
        </form>
    </div>
    
    <div id="art_content">
        <label>Baza artykułów</label>
        <ol>
        <?php foreach($articles as $article) { ?>
        <li>
            <input class="kneflik-gren"  type="button" value="Podgląd" onclick="window.location.href='article-edit.php?id=<?php echo $article['ArticleID']; ?>'" />
        
            <input class="kneflik-blue"  type="button" value="Edytuj" onclick="window.location.href='article-edit.php?id=<?php echo $article['ArticleID']; ?>'" />
        
            <input class="kneflik-red"  type="button" value="Usuń" onclick="window.location.href='article-delete.php?id=<?php echo $article['ArticleID']; ?>'" />
            
            <?php echo $article['Title']; ?>
            
            
        - <small>
        dodano <?php echo date("Y-m-d H:i:s",strtotime($article['InsertDate'])); ?>
        </small>
     
        <?php } ?>
        </ol>

    </div>
</body>
</html>
