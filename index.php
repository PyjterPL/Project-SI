<?php 
require_once('connection.php');
require_once('article_class.php');
$article = new Article;
$articles = $article->fetch_last();
session_start();
if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
{
    $file = "panel.php";
    $mention = $_SESSION['User'];
}
else
{
    $file = "flog.php";
    $mention = "Zaloguj się";
}
?>

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
        <!-- KOMENT TESTOWY -->
        <a href="#" class="scrollup"></a>
   
        <div class="nav">
			<ol>
				<li><a href="index.php">Strona główna</a></li>
				<li><a href="#">Artykuły</a>
					<ul>
						<li><a href="#">C</a></li>
						<li><a href="#">C++</a></li>
						<li><a href="#">HTML</a></li>
						<li><a href="#">Sieci komputerowe</a></li>
					</ul>
				</li>
				<li><a href="article-search.php">Szukaj</a>
				<!-- Komentarz -->
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
				<li><a href="<?php echo $file?>"> <?php echo $mention?> </a></li>
			</ol>
		
		</div>
        
        <h1> STRONA TESTOWA PROJEKT</h1>
      <!-- Pętla wyświetlająca artykuły -->
	  <?php	foreach($articles as $article) { ?>
		<br/> <br/><br/><br/>
	<article>
		<a href="Read_Article.php?id=<?php echo $article['ArticleID'];?>"> 
			<h1> 
				<font size="10" color="black"> 
					<?php echo $article['Title']; ?> 
				</font>  
		  </h1>
		</a>
		<font size = "4" color = "grey"> 
			<?php echo $article['Introduction']; ?> 
		</font>
	</article>
		<br/> <br/>
	  
	  <?php } ?> 
	  <!-- Koniec Foreach -->

		<a href="screenshots/htmlcheatsheet.jpg" target="_blank">
			<img alt="Zrzut ekranu pokazujący szybką edycję CSS" src="screenshots/htmlcheatsheet.jpg" />
		</a>
		
		
    </body>
</html>