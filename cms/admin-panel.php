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
    <div class="container">
<a href="../index.php" id="logo">Strona glowna</a>
    <ol>
    <a href="articles-options.php">Artykuły</a>;
    </ol>
    <ol>
    <a href="user-options.php">Użytkownicy</a>;
    </ol>
    <ol>
    <a href="categories-options.php">Kategorie</a>;
    </ol>
    </div>
</body>
</html>
