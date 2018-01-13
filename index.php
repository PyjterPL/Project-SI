<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Projekt SI</title>
        <meta name="description" content="test">
        <link rel="stylesheet" href="CSS/main.css">
        
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		
        <script src="jquery.scrollTo.min.js"></script>
	
	<script>
		
		jQuery(function($)
		{
			
			$.scrollTo(0);
			$('.scrollup').click(function() { $.scrollTo($('body'), 1000); });
		}
		);
		

		$(window).scroll(function()
		{
			if($(this).scrollTop()>400) $('.scrollup').fadeIn();
			else $('.scrollup').fadeOut();		
		}
		);
	
	
	</script>
	
        
        
    </head>
    <body>
        
        <a href="#" class="scrollup"></a>
   
        <div class="nav">
			<ol>
				<li><a href="#">Strona główna</a></li>
				<li><a href="#">Artykuły</a>
					<ul>
						<li><a href="#">C</a></li>
						<li><a href="#">C++</a></li>
						<li><a href="#">HTML</a></li>
						<li><a href="#">Sieci komputerowe</a></li>
					</ul>
				</li>
				<li><a href="#">Szukaj</a>
				
				</li>
				<li><a href="#">Dodaj artykuł</a>
				
				</li>
				<li><a href="#">O autorach</a>
					<ul>
						<li><a href="#">Snopek Jan</a></li>
						<li><a href="#">Sladkowski Konrad</a></li>
						<li><a href="#">Zuber Piotr</a></li>
					</ul>
				</li>
                <li><a href="#">Kontakt</a>
				
				</li>
				<li><a href="flog.php">Zaloguj</a></li>
			</ol>
		
		</div>
        
        <h1> STRONA TESTOWA PROJEKT</h1>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <h1> 1.</h1>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <h1>2.</h1>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <h1>3.</h1>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <h1> 4.</h1>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <h1>5.</h1>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <h1>6.</h1>
        
		<a href="screenshots/htmlcheatsheet.jpg" target="_blank">
			<img alt="Zrzut ekranu pokazujący szybką edycję CSS" src="screenshots/htmlcheatsheet.jpg" />
		</a>
		
		
    </body>
</html>