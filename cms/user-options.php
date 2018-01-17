<?php
require_once('../connection.php');
require_once('../user_class.php');
$user = new User;
$users = $user->fetch_all();
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

<input type="button" value="Strona główna" onclick="window.location.href='../index.php'" /> 
<input type="button"  id="logo" value="Dodaj Użytkownika" onclick="window.location.href='user-add.php'" />

<input type="button" value="Panel Administratora" onclick="window.location.href='admin-panel.php'" />

</div>

<div id="article-opt">
    <ol>
        <?php foreach($users as $user) { ?>
        <li>
        <div id="art-wpis">

            <b>  <?php echo $user['Name']; ?> </b>

            <div id="edit-buttons">
            <input class="kneflik-gren"  type="button" value="Edytuj" onclick="window.location.href='user-edit.php?id=<?php echo $user['UserID']; ?>'" />
            
            <input class="kneflik-red"  type="button" value="Usuń" onclick="window.location.href='user-delete.php?id=<?php echo $user['UserID']; ?>'" />
        </div>
           
        <?php } ?>
        </li>
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