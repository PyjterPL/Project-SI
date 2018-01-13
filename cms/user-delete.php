<?php
require_once('../connection.php');
require_once('../user_class.php');

session_start();
$user = new User;
if(isset($_GET['id']) && isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{
    $id = $_GET['id'];
    $user->delete_user($id);
     header('Location: user-options.php');
   // echo "usunieto";
     exit();
}
else
{
    header('Location: ../index.php');
    exit();
}
?>