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
        <link rel="stylesheet" href="../CSS/Login.css" /> 
    </head>

    <body>


        <div id="article-navi">
           
                <input type="button" value="Panel Administratora" onclick="window.location.href='admin-panel.php'" /> 
                <input type="button" value="Dodaj Artykuł" onclick="window.location.href='article-add.php'" /> 
                <input type="button" value="Strona główna" onclick="window.location.href='../index.php'" /> 
           
        </div>

        <div id="article-opt">
            <ol>
                <?php foreach($articles as $article) { ?>
                    <li>

                        <div id="art-wpis">
                            <div id="art-placement">
                            <b> <?php echo $article['Title'];?> </b>
                </div>
                            
                        
                            <small> Dodano <?php echo date("Y-m-d H:i:s",strtotime($article['InsertDate'])); ?> </small>
               
                            <div id="edit-buttons">
                            <input class="kneflik-gren"  type="button" value="Podgląd" onclick="window.location.href='../Read_Article.php?id=<?php echo $article['ArticleID']; ?>'" />
            
                            <input class="kneflik-blue"  type="button" value="Edytuj" onclick="window.location.href='article-edit.php?id=<?php echo $article['ArticleID']; ?>'" />
            
                            <input class="kneflik-red"  type="button" value="Usuń" onclick="window.location.href='article-delete.php?id=<?php echo $article['ArticleID']; ?>'" />
                              </div>
                         </div>

                    </li>
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
