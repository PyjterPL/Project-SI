<?php 
require_once('connection.php');
require_once('article_class.php');
require_once('articles_categories_class.php');
$article = new Article;
$category = new Category;
$categories = $category->fetch_all();
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
<HTYML>

    <HEAD>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Projekt SI</title>
        <meta name="description" content="test">
        <link rel="stylesheet" href="CSS/main.css">
        
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="jquery.scrollTo.min.js"></script>
	

		<SCRIPT>
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
		</SCRIPT>

	</HEAD>
	

    <BODY>
        
		<a href="#" class="scrollup"></a>
		
		<div id="Main-Container">

				<div class="nav">

					<ol>
						<li><a href="index.php">Strona główna</a></li>

						<li><a href="#">Kategorie</a>
							<ul>
								<?php
								foreach($categories as $category)
								{
									echo '<li><a href="search-article-action.php?search-type=category&search-string='.$category['CategoryID'].'">'.$category['Name'].'</a></li>';
								}
								?>
							</ul>
						</li>

						<li><a href="article-search.php">Szukaj</a></li>
						
						<li><a href="<?php echo $file?>"> <?php echo $mention?> </a></li>
					</ol>
				
				</div>


			<!-- Pętla wyświetlająca artykuły -->
			<?php	foreach($articles as $article) { ?>

			<Article>
			
				<div id="Wpis">

					<div id="Article">
						<a href="Read_Article.php?id=<?php echo $article['ArticleID'];?>"> 
							<h1> 
								<?php echo $article['Title']; ?> 
								<?php	if(!empty($article['Image']))echo '<img height="100" width="100" src="data:image/jpeg;base64,'.base64_encode( $article['Image'] ).'"/>'; ?>
							</h1>
						</a>

						<div id="image-div">
						</div>

						<h6>
							<?php echo $article['Introduction']; ?> 
						<h6>

					</div>

				</div> <!-- Wpis end -->

			</Article>

			<?php } ?> 
			<!-- Koniec Foreach -->
		
		</div>

		<div id="FOOTER">

			<h2>&copy; 2018 Politechnika Śląska wydział Elektryczny Informatyka Sekcja 5 Sem V
				<p>Strona ta powstała na potrzeby projektu z przedmiotu "Serwisy Internetowe" jej autorami są Snopek Jan, Sladkowski Konrad, Zuber Piotr</P>
			</h2>

		</div>

	</BODY>

</HTML>




	<!--		<a href="screenshots/htmlcheatsheet.jpg" target="_blank">
			<img alt="Zrzut ekranu pokazujący szybką edycję CSS" src="screenshots/htmlcheatsheet.jpg" />
		</a>
	-->

		