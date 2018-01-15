<?php
require_once('../connection.php');
session_start();
if(!(isset($_SESSION['logged'])) || !($_SESSION['logged']==true))
{
   header("Location: ../index.php");
}
// PLACEHOLDER
header("Location: user_edition.php");
?>