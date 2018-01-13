<?php
	session_start();	

	if(isset($_POST['email'])&& isset($_POST['haslo'])&& isset($_POST['login']) && isset($_POST['haslo2'])) // sprawdzanie czy użytkownik kliknął zarejestruj się 
	{
		//echo 'DEBUG: '.$_POST['email'].' '.$_POST['login'].' '.$_POST['haslo']; // sprawdzenie 
		
		// Sprawdzenie poprawności danych 
		$Validation_OK = true;
		
		// Poprawność Loginu
		$login = $_POST['login'];
		
		// Poprawność długości loginu
		
		if((strlen($login)<3)|| (strlen($login)>20))
		{
			$Validation_OK = false;
			$_SESSION['err_login']= "Login musi posiadać od 3 do 20 znaków";
		}
		if(ctype_alnum($login)==false)
		{
			$Validation_OK=false;
			$_SESSION['err_login']="Login może składać się tylko z liter i (cyfr bez polskich znaków)";
			
			
		}
		$email=$_POST['email'];
		$filtered_email = filter_var($email,FILTER_SANITIZE_EMAIL); // Usuwa(lub raczej WYCINA) wszystkie znaki z adresu e-mail oprócz liter,cyfr oraz !#$%&'*+-=?^_`{|}~@.[]. 
		
		if((filter_var($filtered_email,FILTER_VALIDATE_EMAIL)==false)|| ($filtered_email!=$email))
		{
		$Validation_OK= false;
		$_SESSION['err_mail'] ="Podaj poprawny adres e-mail";
		
		}
		$haslo= $_POST['haslo'];
		$haslo2=$_POST['haslo2'];
		
		if(strlen($haslo) <8 || strlen($haslo) > 25)
		{
			$Validation_OK=false;
			$_SESSION['err_haslo']="Hasło musi być dłuższe niż 8 znaków i krótsze niż 25 znaków";
			
		}
		if($haslo != $haslo2)
		{
			$Validation_OK=false;
			$_SESSION['err_haslo']="Podane hasłą muszą być identyczne";
			
		}
		// Haszowanie hasła obecnie szyfruje się: bCrypt  user:test hasło:123qwerty
		$haslo_hashed = password_hash($haslo,PASSWORD_DEFAULT); // DEFAULT oznacza tutaj --> użyj najsliniejszego (obecnie) algorytmu 
		
		// TO ECHO SŁUŻY DO TESTOWEGO WYPISANIA HASZU NP W CELU PODMIANY HASŁA W BAZIE DANYCH --> TESTOWANIE INNYCH UŻYTKOWNIKÓW 
		
	//	echo $haslo_hashed; exit();   <---- zahaszowane hasło jeśli zachodzi taka potrzeba to odkomentować 
		
		if(!isset($_POST['regulamin']))
		{
			$Validation_OK=false;
			$_SESSION['err_regulamin']="Aby kontynuować musisz zaakceptować regulamin";
			
		}
		// Zabezpieczenie przed botami
		
		$secret="6LfT8j4UAAAAAIFP-EsNHkQGlA2alVTl48lHA_6Z";
		$check= file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
		
		// Odpowiedź google nadejdzie w formacie JSON
		$response=json_decode($check);
		
		if($response->success==false)
		{
			$Validation_OK=false;
			$_SESSION['err_bot'] = "Potwierdź,że jesteś człowiekiem";
			
		}
		
		require_once "connect.php";
		
		mysqli_report(MYSQLI_REPORT_STRICT); // Zamiast Warning rzuci Exception. Pozbędziemy się dzięki temu warningów na stronie z wrażliwymi danymi. 
		
		try
		{
	     	$connect = new mysqli($host,$db_user,$db_password,$db_name);
			if($connect->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				$result= $connect->query("SELECT UserID FROM users WHERE Email='$email'");
				
				if(!$result) throw new Exception($connect->error);
				
				$Number_of_Emails = $result->num_rows;
				if($Number_of_Emails > 0 )
				{
					$Validation_OK=false;
					$_SESSION['err_mail']="Istnieje już konto z przypisanym tym adresem E-mail";
				}
				
				// Sprawdzenie czy Login/nick jest juz zajęty
				
				$result= $connect->query("SELECT UserID FROM users WHERE Name='$login'");
				
				if(!$result) throw new Exception($connect->error);
				
				$Number_of_Logins = $result->num_rows;
				if($Number_of_Logins > 0 )
				{
					$Validation_OK=false;
					$_SESSION['err_login']="Wprowadzony login jest już zajęty";
				}
				// ZAKOŃCZONO SPRAWDZANIE DANYCH
				
				if($Validation_OK==true)
				{
					// Jeśli rejestracja się udała to kod ponieżej wykona się 
				    if($connect->query("INSERT INTO users VALUES(NULL,'$login','$haslo_hashed','$email',NULL,NULL,3,NULL)"))
					{
						$_SESSION['succes']=true;
						header('Location: Welcome.php');
					}
					else
					{
							throw new Exception($connect->error);
					}
					
				}
				
			
					$connect->close();
			}
		}
		catch(Exception $patronus) // nie mogłem się powstrzymać 
		{
			echo '<span style="color:red;">Bład Serwera! Rejestracja tymczasowo niemożliwa</span>';
			echo '<br/>Informacje techniczne: '.$patronus; // Informacje Developerskie w wersji finalnej usunąć tą linię lub zmienić jej formę 
			
		}
		//echo "<br>CHECKBOX ".$_POST['regulamin']; exit();
		
		
	}
	
?>
<!DOCTYPE HTML> 
<html lang ="pl">
<head> 
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title> TROCHĘ NIERÓWNY PANEL GŁÓWNY</title>
    <link rel="Stylesheet" type="text/css" href="CSS/Login.css" />
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
	<!--Kod czerwonego napisu w przypadku zbyt krótkiego loginu.  !!Place Holder poniższy styl zastąpić CSS'em!! -->
	<style>
		.error
		{
			color:red;
			maring-top: 10px;
			margin-bottom: 10px;
		}
		</style>
</head>

    
    
<body>
     <!-- Forma Rejestracji -->
    <div id="containerforregister">
        
	<form method ="post">
		<input type="text" name ="login" placeholder="Login" /><br/>
		
		
		<?php // Sprawdzenie poprawoności loginu 
			if(isset($_SESSION['err_login']))
			{
				echo '<div class="error">'.$_SESSION['err_login'].'</div>';
				unset($_SESSION['err_login']);
			}
		?>
		<input type="text" name ="email" placeholder="Email"/>
			<?php // Sprawdzenie poprawności e-mail
			if(isset($_SESSION['err_mail']))
			{
				echo '<div class="error">'.$_SESSION['err_mail'].'</div>';
				unset($_SESSION['err_mail']);
			}
		?>
		
        <input type="password" name ="haslo" placeholder="Hasło"/>
		<?php // Sprawdzenie poprawności haseł 
			if(isset($_SESSION['err_haslo']))
			{
				echo '<div class="error">'.$_SESSION['err_haslo'].'</div>';
				unset($_SESSION['err_haslo']);
			}
		?>
		
		<input type="password" name ="haslo2" placeholder="Powtórz Hasło"/>
		
		<label>
       
		<input type="checkbox" name = "regulamin" /> Akceptuje regulamin
		</label>
        
		<?php // Sprawdzenie akceptacji regulaminu (checkbox)
			if(isset($_SESSION['err_regulamin']))
			{
				echo '<div class="error">'.$_SESSION['err_regulamin'].'</div>';
				unset($_SESSION['err_regulamin']);
			}
		?>
        
		
		<div class="g-recaptcha" data-sitekey="6LfT8j4UAAAAAMdYetjCV2EEf_F3zkUe_o-Wa-HH"></div>
		
		<?php // Sprawdzenie CAPTCHA 
			if(isset($_SESSION['err_bot']))
			{
				echo '<div class="error">'.$_SESSION['err_bot'].'</div>';
				unset($_SESSION['err_bot']);
			}
		?>
		
		<input type="submit" value = "Zarejetruj się"/>
        <input type="button" value="Powrót" onclick="window.location.href='index.php'" />
		</form>
        
      
        
       
        </div>

</body>
</html>