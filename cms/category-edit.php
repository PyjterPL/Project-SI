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
        <link rel="stylesheet" href="../CSS/Login.css" /> 
    </head>
         <body>
            <div id="container">
            
            <label>Edytuj Kategorię</label>
            </br></br>
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