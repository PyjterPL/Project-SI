<?php
	session_start();	
	if(!isset($_SESSION['succes']))
	{
		header('Location: index.php');
		exit();
	}
	else
	{
		unset($_SESSION['succes']);
	}
?>
<!DOCTYPE HTML> 
<html lang ="pl">
<head> 
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title> TROCHĘ NIERÓWNY PANEL GŁÓWNY</title> 
</head>

<body>

	Rejestracja powiodła się. Teraz możesz zalogować się na swoje konto! <br/><br/>
	
	<a href="index.php"> <Zaloguj się na swoje konto !</a>
	<br/><br/>


</body>
</html>