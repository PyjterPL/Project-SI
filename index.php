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
	<link rel="Stylesheet" type="text/css" href="css_plik.css" />
	
	<title> TYTUL </title> 
</HEAD>
<BODY>

<div id="header" >
JANEK WGRAJ TĄ NOWĄ WERJSĘ STRONY DO CHOLERY ! - życzyliwie S. :)
</div>


<div id="navi">

<form action = "login.php" method="post">

		Login: <br/> <input type="text" name="login"/> <br/>
		Hasło: <br/> <input type ="password" name = "pass"/> <br/> <br/>
		<input type = "submit" value = "Zaloguj Się"/>
		
</form>
<?php
	if(isset($_SESSION['errlog'])) echo $_SESSION['errlog'];
	
?>

</div>

<div id="content">
JANEK WGRAJ TĄ NOWĄ WERJSĘ STRONY DO CHOLERY ! - życzyliwie S. 
</div>


<div id="baner">
<!--<img src="reklama.JPG" alt="reklama" />--> 
reklama
</div>

<div  id="footer">
Footer &copy Wszelkie prawa zastrze�one
</div>


	

	


</BODY>
</HTML>

