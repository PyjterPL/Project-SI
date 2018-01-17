<?php
require_once('../connection.php');
require_once('../articles_categories_class.php');
$category = new Category;
$categories = $category->fetch_all();
session_start();
if(isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{ ?>


<html>
<head>
    <title>CMS</title>
    <link rel="stylesheet" href="../CSS/Login.css" /> 
</head>



<body>

    <div id="article-navi">

        <input type="button" value="Panel Administratora" onclick="window.location.href='admin-panel.php'" /> 
        <input type="button" value="Dodaj Kategorię" onclick="window.location.href='category-add.php'" id="logo" /> 
        <input type="button" value="Strona główna" onclick="window.location.href='../index.php'" /> 

    </div>

    <div id="category-opt">

        <label>Opcje Kategorii</label>
        <ol>
            <?php foreach($categories as $category) { ?>
            <li>
                <div id="category-wpis">
                    <label>    <?php echo $category['Name']; ?></label>

                    <div id="edit-buttons">
                        <input class="kneflik-gren"  type="button" value="Edytuj" onclick="window.location.href='category-edit.php?id=<?php echo $category['CategoryID']; ?>'">
                        <input class="kneflik-red"  type="button" value="Usuń" onclick="window.location.href='category-delete.php?id=<?php echo $category['CategoryID']; ?>'" />
                    </div>
                    
                </div>
                <?php } ?>
            </li>
        </ol>
    </div>

    </div>
</body>


</html>

<?php }
else
{
    header('Location: ../index.php');
    exit();
}
?>