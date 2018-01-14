<?php
require_once('../connection.php');
require_once('../article_class.php');

session_start();
$article = new Article;
if(isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{
    ?>
    <html>
    <head>
        <title>Dodawanie artykułu</title>
        <link rel="stylesheet" href="../CSS/Login.css" /> 
    </head>
        
         <body>
            <div id="add_article">
            <label>Dodawanie artykułu</label>
                <?php
                if(isset($_GET['error']))
                {
                    echo $_GET['error'];
                }
                ?>
                
                <div id="theme">
                <form action="add-article-action.php" method="post" autocomplete="off">
                
                <input type="text" name="title" placeholder="Tytuł"/>
            
                <input type="text" name="tags" placeholder="Tagi"/>
                    </form>
                </div>
                <textarea rows="5" cols="80" placeholder="Wstęp" name="introduction"></textarea>
                    
                <textarea rows="15" cols="80" placeholder="Treść" name="content"></textarea>
                    
                
                    
                <input type="submit" value="Dodaj do bazy" />
            
                <input type="button" value="Powrót" onclick="window.location.href='articles-options.php'" />
                    
                
            </div>
        </body>
    </html>

    <?php
}
else
{
    header('Location: ../index.php');
    exit();
}
?>