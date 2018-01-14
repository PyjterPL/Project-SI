<?php
require_once('../connection.php');
session_start();	
?>

<html>
<head>
    <title>CMS</title>
    <link rel="stylesheet" href="admin-panel-style.css" /> 
</head>
<body>
    
    
<div id="container">
    
    <form>
        <label>Panel Administratora</label>
        <input type="button" value="Artykuły" onclick="window.location.href='articles-options.php'" />
       
        <input type="button" value="Użytkownicy" onclick="window.location.href='user-options.php'" />

        <input type="button" value="Kategorie" onclick="window.location.href='categories-options.php'" />
       
        <input type="button" value="Strona główna" onclick="window.location.href='../index.php'" />
        
        <input type="button" value="Panel Użytkownika" onclick="window.location.href='../panel.php'" />
        
        

    </form>
</div>
    
</body>
</html>
