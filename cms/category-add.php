<?php
require_once('../connection.php');
require_once('../articles_categories_class.php');


session_start();
$category = new Category;
if( isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  ($_SESSION['PermissionID']<3))
{   
    //$data = $user->fetch_data($id);
   // $categories = $category->fetch_all();
    
    ?>
    <html>
    <head>
        <title>Dodawanie użytkownika</title>
        <link rel="stylesheet" href="admin-panel-style.css" /> 
    </head>
         <body>
            <div class="container">
            <a href="articles-options.php">Powrót</a>
            </br>
            <h4>Dodawanie użytkownika</h4>
                <?php
                if(isset($_GET['error']))
                {
                    echo $_GET['error'];
                }
                ?>

                <form action="add-category-action.php" method="post" enctype="multipart/form-data">
                Kategoria <input type="text" name="name" placeholder="Nazwa" value=""/></br></br>
               
                <input type="submit" value="Dodaj" />
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