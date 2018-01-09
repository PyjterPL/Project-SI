<?php
	session_start();	
	if(!isset($_SESSION['logged']))
	{
		header('Location: index.php');
		exit();
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

<?php
	
	echo"<p>Witaj ".$_SESSION['User'].'[<a href="logout.php">Wyloguj się</a>]</p>';
	echo '<img height="50" width="50" src="data:image/jpeg;base64,'.base64_encode( $_SESSION['Avatar'] ).'"/>';
	echo"<p><b>E-mail</b>: ".$_SESSION['Email']; 
	if ($_SESSION['PermissionID']==1)//Jeśli to admin
	{
		echo '<br><a href="cms/admin-panel.php" id="logo">Panel Administratora</a></br>';
	}

?>

</body>
</html>