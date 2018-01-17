<?php
require_once('../connection.php');
require_once('../article_class.php');
require_once('../articles_categories_class.php');
session_start();
$article = new Article;
$category= new Category;
if(isset($_GET['id']) && isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  ($_SESSION['PermissionID']<3))
{   
    $id=$_GET['id'];
    $data = $article->fetch_data($id);
    $categories = $category->fetch_all();
    ?>
    <html>
    <head>
        <title>Edycja artykułu</title>
        <link rel="stylesheet" href="../CSS/Login.css" /> 
    </head>
         <body>
            <div id="add_article">
            <label>Edycja Artykułu</label>
                <?php
                if(isset($_GET['error']))
                {
                    echo $_GET['error'];
                }
                ?>

                <form action="edit-article-action.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <div id="add-article-inputs">
                    Tytuł: <input type="text" name="title" placeholder="Tytuł" value="<?php echo $data['Title']; ?>"/></br>
                    Tagi: <input type="text" name="tags" placeholder="Tagi" value="<?php echo $data['Tags']; ?>"/></br>
                    Kategoria: <input list="categories" name = "category" placeholder="Kliknij aby wybrać kategorię"></br>
                    Obraz: <input type="file" name="obrazek" accept="image/jpeg,image/gif,image/jpg" />
                    </div>

                    <div id="add-article-text">
                    Wstęp:</br>
                    <textarea rows="5" cols="40" placeholder="Wstęp" name="introduction"><?php echo $data['Introduction']; ?></textarea></br>
                    Treść:</br>
                    <textarea rows="15" cols="60" placeholder="Treść" name="content"><?php echo $data['Content']; ?></textarea>
                    </div>

                    <?php 

                    if(!empty($data['Image']))
                    {
                    echo '<img height="50" width="50" src="data:image/jpeg;base64,'.base64_encode( $data['Image'] ).'"/>';
                    }
                    ?>
                   
                        <datalist id="categories">                                          
                            <?php foreach($categories as $category) { ?> 
                                <option value="<?php echo $category['CategoryID'].'.'.$category['Name']; ?>">  
                                <?php } ?>                     
                        </datalist> 

                    <input type="submit" value="Edytuj" />
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