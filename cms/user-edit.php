<?php
require_once('../connection.php');
require_once('../user_class.php');
require_once('../permissions_class.php');


session_start();
$user = new User;
$permission = new Permission;
if(isset($_GET['id']) && isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  ($_SESSION['PermissionID']<3))
{   
    $id=$_GET['id'];
    $data = $user->fetch_data($id);
    $permissions = $permission->fetch_all();
    
    ?>
    <html>
    <head>
        <title>Edycja danych użytkownika</title>
        <link rel="stylesheet" href="admin-panel-style.css" /> 
    </head>
         <body>
            <div class="container">
            <a href="user-options.php">Powrót</a>
            </br>
            <h4>Edycja danych</h4>
                <?php
                if(isset($_GET['error']))
                {
                    echo $_GET['error'];
                }
                ?>

                <form action="edit-user-action.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                Login<input type="text" name="name" placeholder="Login" value="<?php echo $data['Name']; ?>"/></br></br>
                Hasło<textarea rows="5" cols="20" placeholder="Hasło" name="password"></textarea></br></br>
               Email<textarea rows="15" cols="20" placeholder="mail" name="mail"><?php echo $data['Email']; ?></textarea></br></br>
               Opis <input type="text" name="description" placeholder="Opis" value="<?php echo $data['Description']; ?>"/></br></br>
               Obrazek  <input type="file" name="obrazek" accept="image/jpeg,image/gif,image/jpg" /></br></br>
               <?php 
                if(!empty($data['Avatar']))
                {
                 echo '<img height="50" width="50" src="data:image/jpeg;base64,'.base64_encode( $data['Avatar'] ).'"/>';
                }
                ?></br></br>
               Uprawnienia <input list="permissions" name = "permission">
                    <datalist id="permissions">                                          
                        <?php foreach($permissions as $permission) { ?> 
                            <option value="<?php echo $permission['PermissionID'].'.'.$permission['Description']; ?>">  
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