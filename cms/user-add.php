<?php
require_once('../connection.php');
require_once('../user_class.php');
require_once('../permissions_class.php');


session_start();
$user = new User;
$permission = new Permission;
if( isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  ($_SESSION['PermissionID']<3))
{   
    //$data = $user->fetch_data($id);
    $permissions = $permission->fetch_all();
    
    ?>
    <html>
    <head>
        <title>Dodawanie użytkownika</title>
        <link rel="stylesheet" href="../CSS/Login.css" /> 
    </head>



         <body>

         <div id="add_article">


        
            <label>Dodawanie użytkownika</label>
                <?php
                if(isset($_GET['error']))
                {
                    echo $_GET['error'];
                }
                ?>

                <form action="add-user-action.php" method="post" enctype="multipart/form-data">

                    <div id="add-user-inputs">

                        <input type="text" name="name" placeholder="Login" value=""/>
                        <input type="password" placeholder="Hasło" name="password"></textarea>
                        <input type="text" placeholder="Email" name="mail"></textarea>
                        <input type="text" name="description" placeholder="Opis" value=""/>
                        <input type="file" name="obrazek" accept="image/jpeg,image/gif,image/jpg" />
                        <input list="permissions" placeholder="Kliknij aby wybrać uprawninia" name = "permission">


                        <datalist id="permissions">                                          
                        <?php foreach($permissions as $permission) { ?> 
                        <option value="<?php echo $permission['PermissionID'].'.'.$permission['Description']; ?>">  
                        <?php } ?>                     
                        </datalist> 

                        <input type="submit" value="Dodaj" />
                        <input type="button" value="Powrót" onclick="window.location.href='user-options.php'" /> 

                    </div>
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