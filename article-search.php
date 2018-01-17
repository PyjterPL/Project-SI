<?php
require_once('connection.php');
require_once('article_class.php');
require_once('articles_categories_class.php');
session_start();
$article = new Article;
$category= new Category;

    ?>
    <html>
    <head>
        <title>Wyszukiwarka</title>
        <link rel="stylesheet" href="CSS/Login.css" /> 
    </head>
         <body>
            <div id="container">

            </br>
            <label>Wyszukiwarka</label>
                <?php
                if(isset($_GET['error']))
                {
                    echo $_GET['error'];
                }
                ?>

                <form action="search-article-action.php" method="post" autocomplete="off" >

                    <input type="text" name="search-string" placeholder="Wpisz szukaną frazę"/>
                    <div id="wyszukaj">
                    
                    <label> <input type="radio" name="search-type" value="title" checked>Tytuł</label></br>
                    <label><input type="radio" name="search-type" value="author">Autor</label></br>
                    <label><input type="radio" name="search-type" value="tags">Tagi </label></br>
                    
                    </div>
                    <input type="submit" value="Szukaj" />
                    <input type="button" value="Powrót" onclick="window.location.href='index.php'" />
                    
                </form>
            </div>
        </body>
    </html>

    <?php


?>