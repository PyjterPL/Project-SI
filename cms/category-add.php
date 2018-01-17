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
        <link rel="stylesheet" href="../CSS/Login.css" /> 
    </head>


    <body>
        <div id="container">
            <label>Dodaj Kategorię</label>

            <?php
            if(isset($_GET['error']))
            {
            echo $_GET['error'];
            }
            ?>

            <form action="add-category-action.php" method="post" enctype="multipart/form-data"></br>
                <input type="text" name="name" placeholder="Kategoria" value=""/></br></br>
                <input type="submit" value="Dodaj" />
                <input type="button" value="Powrót" onclick="window.location.href='categories-options.php'" /> 
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