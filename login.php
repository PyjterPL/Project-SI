<?php
	require_once "connect.php";
	
	$connect = @new mysqli($host,$db_user,$db_password,$db_name); // wyciszanie błędu 

	if($connect->connect_errno!=0)
	{
		echo "Error".connect_errno." Opis: ".$connect->connect_error; // wypieprzyć ten opis 
	}
	else
	{
	  $login = $_POST['login'];
	  $pass = $_POST['pass'];
	  echo "działa";
	  $sql = "SELECT * FROM users WHERE Name='$login' AND Password ='$pass'";
	  
	 if( $result = @$connect->query($sql));
	 {
		 $nou= $result->num_rows;		 // NumberOfUsers
		 if($nou>0)
		 {
			 $row = $result->fetch_assoc();
			 $user = $row['Name'];
			 
			 
			 $result->free();
			 
			 echo $user;
		 }
		 else
	     {
			
		 }
	 }
	  $connect->close();
	}
	
	


?>