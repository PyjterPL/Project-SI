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

                <form action="add-user-action.php" method="post">
                Login<input type="text" name="name" placeholder="Login" value=""/></br></br>
                Hasło<textarea rows="5" cols="20" placeholder="Hasło" name="password"></textarea></br></br>
               Email<textarea rows="15" cols="20" placeholder="mail" name="mail"></textarea></br></br>
               Opis <input type="text" name="description" placeholder="Opis" value=""/></br></br>

               Uprawnienia <input list="permissions" name = "permission">
                    <datalist id="permissions">                                          
                        <?php foreach($permissions as $permission) { ?> 
                            <option value="<?php echo $permission['PermissionID'].'.'.$permission['Description']; ?>">  
                            <?php } ?>                     
                    </datalist> 
                    
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