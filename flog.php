<?php

	session_start();
	if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
	{
		header('Location: panel.php');
		exit();
	}
?>

<!DOCTYPE HTML>
<HTML lang="pl">

<HEAD>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
	<meta name="Description" content="Opis strony" />
	<meta name="Keywords" content="Wyrazy kluczowe" />
	<link rel="Stylesheet" type="text/css" href="CSS/Login.css" />
	
	<title> TYTUL </title> 
</HEAD>
    
    
<BODY>
    
    
<div id="page">  
    <div id="container">  
        
    <form action = "login.php" method="post">

         <input type="text" name="login" placeholder="Login"/> 
         <input type ="password" name = "pass" placeholder="Hasło"/>
         <input type = "submit" value = "Zaloguj Się"/>

    </form>

    <form action ="rejestracja.php" method="post">

    <input type = "submit" value="Zarejestruj się"/> <br />
    </form> 

    <form>
        <input type="button" value="Powrót" onclick="window.location.href='index.php'" />
    </form> 
    <!-- <button> <a href="index.php"></a>  Powrót</button>
   <!--<br> <a href="index.php" class="button">Powrót</a>-->

    <?php
        if(isset($_SESSION['errlog'])) echo $_SESSION['errlog'];

    ?>
    </div>
</div>
    
</BODY>
</HTML>

