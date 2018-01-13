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
        <link rel="stylesheet" href="admin-panel-style.css" /> 
    </head>
         <body>
            <div class="container">
            <a href="articles-options.php">Powrót</a>
            </br>
            <h4>Edycja artykułu</h4>
                <?php
                if(isset($_GET['error']))
                {
                    echo $_GET['error'];
                }
                ?>

                <form action="edit-article-action.php?id=<?php echo $id; ?>" method="post">
                <input type="text" name="title" placeholder="Tytuł" value="<?php echo $data['Title']; ?>"/></br></br>
                <textarea rows="5" cols="20" placeholder="Wstęp" name="introduction"><?php echo $data['Introduction']; ?></textarea></br></br>
                <textarea rows="15" cols="20" placeholder="Treść" name="content"><?php echo $data['Content']; ?></textarea></br></br>
                <input type="text" name="tags" placeholder="Tagi" value="<?php echo $data['Tags']; ?>"/></br></br>
                Kategoria <input list="categories" name = "category">
                    <datalist id="categories">                                          
                        <?php foreach($categories as $category) { ?> 
                            <option value="<?php echo $category['CategoryID'].'.'.$category['Name']; ?>">  
                            <?php } ?>                     
                    </datalist> 

                <input type="submit" value="Edytuj" />
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