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
    <link rel="stylesheet" href="CSS/Login.css">
</head>

<body>

    <div id="container">
    <label>Panel Użytkownika</label>
<?php
	
    
	echo"<p>Witaj ".$_SESSION['User'].'[<a href="logout.php">Wyloguj się</a>]</p>';
	if(!empty($_SESSION['Avatar']))echo '<img height="50" width="50" src="data:image/jpeg;base64,'.base64_encode( $_SESSION['Avatar'] ).'"/>';
	else echo "Brak Avatara";
	echo"<p><b>E-mail</b>: ".$_SESSION['Email']; 
	if ($_SESSION['PermissionID']==1)//Jeśli to admin
	{
		echo '<br><a href="cms/admin-panel.php" id="logo">Panel Administratora</a></br>';
		echo '<br><a href="user_edit/user_edition.php" id="logo">Edycja Danych</a></br>';
	}
?>  
        <input type="button" value="Strona główna" onclick="window.location.href='index.php'"/>

        </div>
</body>
</html>

<!-- <a href="screenshots/htmlcheatsheet.jpg" target="_blank">
			<img alt="Zrzut ekranu pokazujący szybką edycję CSS" src="screenshots/htmlcheatsheet.jpg" />

<form>
        <input type="button" value="Powrót" onclick="window.location.href='index.php'" />
    </form> 
-->