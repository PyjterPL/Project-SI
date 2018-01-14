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
    <link rel="Stylesheet" type="text/css" href="CSS/Login.css" />
</head>

<body>
    <div id="Rejestracja_OK">
	Rejestracja powiodła się. Teraz możesz zalogować się na swoje konto!
	
    <form>
        <input type="button" value="Zaloguj się" onclick="window.location.href='flog.php'" />
    </form> 
	
    </div>

</body>
</html>