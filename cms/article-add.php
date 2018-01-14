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

                <form action="add-article-action.php" method="post" autocomplete="off" enctype="multipart/form-data">
                Tytuł<input type="text" name="title" placeholder="Tytuł"/></br></br>
                Wstęp<textarea rows="5" cols="20" placeholder="Wstęp" name="introduction"></textarea></br></br>
               Treść <textarea rows="15" cols="20" placeholder="Treść" name="content"></textarea></br></br>
                Tagi<input type="text" name="tags" placeholder="Tagi"/></br></br>
               Obrazek <input type="file" name="obrazek" accept="image/jpeg,image/gif,image/jpg" /></br></br>

               Kategoria <input list="categories" name = "category">
                    <datalist id="categories">                                          
                        <?php foreach($categories as $category) { ?> 
                            <option value="<?php echo $category['CategoryID'].'.'.$category['Name']; ?>">  
                            <?php } ?>                     
                    </datalist> </br></br>
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