<?php
require_once('../connection.php');
require_once('../user_class.php');

session_start();
$user = new User;
if(isset($_GET['id']) && isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  ($_SESSION['PermissionID']<3))
{   
    $id=$_GET['id'];
    $data = $user->fetch_data($id);
    
    ?>
    <html>
    <head>
        <title>Edycja danych użytkownika</title>
        <link rel="stylesheet" href="admin-panel-style.css" /> 
    </head>
         <body>
            <div class="container">
            <a href="articles-options.php">Powrót</a>
            </br>
            <h4>Edycja danych</h4>
                <?php
                if(isset($_GET['error']))
                {
                    echo $_GET['error'];
                }
                ?>

                <form action="edit-user-action.php?id=<?php echo $id; ?>" method="post">
                Login<input type="text" name="name" placeholder="Login" value="<?php echo $data['Name']; ?>"/></br></br>
                Hasło<textarea rows="5" cols="20" placeholder="Hasło" name="password"><?php echo $data['Password']; ?></textarea></br></br>
               Email<textarea rows="15" cols="20" placeholder="mail" name="mail"><?php echo $data['Email']; ?></textarea></br></br>
               Opis <input type="text" name="description" placeholder="Opis" value="<?php echo $data['Description']; ?>"/></br></br>

               
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