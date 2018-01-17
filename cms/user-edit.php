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
        <link rel="stylesheet" href="../CSS/Login.css" /> 
    </head>



         <body>
            <div id="add_article">
            <label>Edycja Danych</label></br></br>
                <?php
                if(isset($_GET['error']))
                {
                    echo $_GET['error'];
                }
                ?>

<div id="add-user-inputs-edit">
                <form action="edit-user-action.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                    Login: <input type="text" name="name" placeholder="Login" value="<?php echo $data['Name']; ?>"/></br></br>
                    Hasło: <input type="password" placeholder="Hasło" name="password"></textarea></br>
                    Email: <input type="text" placeholder="<?php echo $data['Email']; ?>" name="mail"></br>
                    Opis: <input type="text" name="description" placeholder="Opis" value="<?php echo $data['Description']; ?>"/></br></br>
                    Obrazek  <input type="file" name="obrazek" accept="image/jpeg,image/gif,image/jpg" /></br></br>

                    <?php 
                    if(!empty($data['Avatar']))
                    {
                    echo '<img height="50" width="50" src="data:image/jpeg;base64,'.base64_encode( $data['Avatar'] ).'"/>';
                    }
                    ?></br></br>
                    Uprawnienia <input list="permissions" name = "permission" placeholder="Kliknij aby wybrać uprawnienia">
                    <datalist id="permissions">                                          
                        <?php foreach($permissions as $permission) { ?> 
                        <option value="<?php echo $permission['PermissionID'].'.'.$permission['Description']; ?>">  
                        <?php } ?>                     
                    </datalist> 
                        </br></br>
                        
                        
                    <input type="submit" value="Edytuj" />
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