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
    </head>
         <body>
            <div class="container">

            </br>
            <h4>Wyszukiwarka</h4>
                <?php
                if(isset($_GET['error']))
                {
                    echo $_GET['error'];
                }
                ?>

                <form action="search-article-action.php" method="post" autocomplete="off" >
                <input type="text" name="search-string" placeholder="Wpisz szukaną frazę"/></br></br>
                <input type="radio" name="search-type" value="title" checked> Tytuł<br>
                <input type="radio" name="search-type" value="author"> Autor<br>
                <input type="radio" name="search-type" value="tags"> Tagi  <br>

                <input type="submit" value="Szukaj" />
                </form>
            </div>
        </body>
    </html>

    <?php


?>