<?php

	session_start();
	
	if((!isset($_POST['login'])) || (!isset($_POST['pass'])))
	{
		header('Location: index.php');
		exit();
	}
	require_once "connect.php";
	
	$connect = @new mysqli($host,$db_user,$db_password,$db_name); // wyciszanie błędu 

	if($connect->connect_errno!=0)
	{
		echo "Error".connect_errno." Opis: ".$connect->connect_error; // usunąc  ten opis 
	}
	else
	{
	  $login = $_POST['login'];
	  $pass = $_POST['pass'];
	  // kwestie bezpieczeństwa 
	  $login=htmlentities($login,ENT_QUOTES,"utf-8");
	  
	 
	 
	 if( $result = @$connect->query(
	 sprintf("SELECT * FROM users WHERE Name='%s'",
	 mysqli_real_escape_string($connect,$login))))
	 {
		 $nou= $result->num_rows;		 // NumberOfUsers
		 if($nou>0)
		 {	
				 $row = $result->fetch_assoc();
				 
				 if(password_verify($pass,$row['Password']))
				 {
				 // ustawienie flagi " użytkownik jest zalogowany"
				 $_SESSION['logged']= true;
				 // Pobieranie danych o użytkowniku 
				
				 $_SESSION['UserID'] = $row['UserID'];
				 $_SESSION['User'] = $row['Name'];
				 $_SESSION['Email']=$row['Email'];
				 $_SESSION['Avatar']=$row['Avatar'];
				 $_SESSION['Description']=$row['Description'];
				 $_SESSION['BirthDate']=$row['BirthDate'];
				 $_SESSION['PermissionID']=$row['PermissionID'];
				 
				 unset($_SESSION['errlog']);
				 // Zwalnianie zasobów i przekierowanie do panelu użytkownia
				 $result->free();
				 header('Location: panel.php');
		 }
		  else
	     {
				$_SESSION['errlog'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: flog.php');
		 }
		 
			//echo $user;
		 }
		 else
	     {
				$_SESSION['errlog'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: flog.php');
		 }
	 }
	  $connect->close();
	}

?>