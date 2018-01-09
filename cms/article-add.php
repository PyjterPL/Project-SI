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
        <link rel="stylesheet" href="admin-panel-style.css" /> 
    </head>
         <body>
            <div class="container">
            <a href="articles-options.php">Powrót</a>
            </br>
            <h4>Dodawanie artykułu</h4>
                <?php
                if(isset($_GET['error']))
                {
                    echo $_GET['error'];
                }
                ?>

                <form action="add-article-action.php" method="post" autocomplete="off">
                <input type="text" name="title" placeholder="Tytuł"/></br></br>
                <textarea rows="5" cols="20" placeholder="Wstęp" name="introduction"></textarea></br></br>
                <textarea rows="15" cols="20" placeholder="Treść" name="content"></textarea></br></br>
                <input type="text" name="tags" placeholder="Tagi"/></br></br>
                <input type="submit" value="Dodaj do bazy" />
                </form>
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