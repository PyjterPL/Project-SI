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
    <link rel="stylesheet" href="admin-panel-style.css" /> 
</head>
<body>
    <div class="container">
<a href="../index.php" id="logo">Strona glowna</a>
</br>
<a href="admin-panel.php" id="logo">CMS</a>
</br>
<a href="category-add.php" id="logo">Dodaj kategorię</a>
    <ol>
        <?php foreach($categories as $category) { ?>
        <li>
            <a href="category-edit.php?id=<?php echo $category['CategoryID']; ?>">
            <?php echo $category['Name']; ?>
            </a>
            <a href="category-delete.php?id=<?php echo $category['CategoryID']; ?>">
            Usuń</a>
            <a href="category-edit.php?id=<?php echo $category['CategoryID']; ?>">
             Edytuj</a>
        <?php } ?>
    </ol>
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