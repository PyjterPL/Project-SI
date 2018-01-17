<?php
require_once('../connection.php');
require_once('../article_class.php');
require_once('../articles_categories_class.php');
session_start();
$article = new Article;
$category= new Category;
if(isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{
    $categories = $category->fetch_all();
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


                <form action="add-article-action.php" method="post" autocomplete="off" enctype="multipart/form-data">
                    
                    <div id="add-article-inputs">
                        <input type="text" name="title" placeholder="Tytuł"/>
                        
                        <input type="text" name="tags" placeholder="Tagi"/>

                        <input type="list" list="categories" name = "category" placeholder="Kliknij aby wybrać kategorię"/>
                        
                        <input type="file" name="obrazek" accept="image/jpeg,image/gif,image/jpg" />
                    </div>
                        
                    <div id="add-article-text">
                        Wstęp:</br>
                        <textarea rows="5" cols="40"  name="introduction"></textarea></br>
                        
                        Treść:</br> <textarea rows="8" cols="60" name="content"></textarea>
                    </div>
                        <datalist id="categories">                                          
                        <?php foreach($categories as $category) { ?> 
                        <option value="<?php echo $category['CategoryID'].'.'.$category['Name']; ?>">  
                        <?php } ?>                     
                        </datalist>
                        <input type="submit" value="Dodaj do bazy" />
                        <input type="button" value="Powrót" onclick="window.location.href='articles-options.php'" /> 
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