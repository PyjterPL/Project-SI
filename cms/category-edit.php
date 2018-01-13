<?php
require_once('../connection.php');

require_once('../articles_categories_class.php');

session_start();
$category= new Category;

if(isset($_GET['id']) && isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  ($_SESSION['PermissionID']<3))
{   
    $id=$_GET['id'];
    $data = $category->fetch_data($id);
    
    ?>
    <html>
    <head>
        <title>Edycja kateogrii</title>
        <link rel="stylesheet" href="admin-panel-style.css" /> 
    </head>
         <body>
            <div class="container">
            <a href="categories-options.php">Powrót</a>
            </br>
            <h4>Edycja kategorii</h4>
                <?php
                if(isset($_GET['error']))
                {
                    echo $_GET['error'];
                    //echo '<img height="50" width="50" src="data:image/jpeg;base64,'.base64_encode( $_SESSION['Avatar'] ).'"/>';
                }
                ?>

                <form action="edit-category-action.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Nazwa" value="<?php echo $data['Name']; ?>"/></br></br>

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