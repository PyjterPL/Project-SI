<?php 
 $dir = getcwd();
require_once('connection.php');
require_once('article_class.php');
require_once($dir.'/comments/comment_class.php');
$article = new Article;
$specific = $article->fetch_data($_GET['id']);
$comment = new Comment;

switch ($_GET['cSort'])
{
    case 'last':  $comments = $comment->fetch_last($_GET['id']);
                 break;
    case 'first': $comments = $comment->fetch_first($_GET['id']);
                 break;
    case 'low'  : $comments = $comment->fetch_lVote($_GET['id']);
                 break;        
    case 'high':  $comments = $comment->fetch_hVote($_GET['id']);   
                 break;
    default:      $comments = $comment->fetch_last($_GET['id']);
                 break;

}


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
				<li><a href="<?php echo $file?>"> <?php echo $mention?> </a></li>
			</ol>
		
		</div>

    
      
      <!-- Artykuł -->
     <article>
        <font size="10" color = "black"> 
              <h1>
                    <?php echo $specific['Title'];?>
              </h1>
       </font>
       <font size ="4" color = "grey">
           <p>
              <?php echo $specific['Content']; ?>
          </p>
       </font> 
     </article>
     <br/><br/><br/><br/><br/>
    <!-- Sposób sortowania komentarzy -->
     <form>
        <font size="2" color ="black">Sortowanie Komentarzy
             <input type="button" value="Najstarsze" onclick="window.location.href='Read_Article.php?cSort=first&id=<?php echo $_GET['id'] ;?> '" />
             <input type="button" value="Najnowsze" onclick="window.location.href='Read_Article.php?cSort=last&id=<?php echo $_GET['id'] ;?> '" />
             <input type="button" value="Najgorsze" onclick="window.location.href='Read_Article.php?cSort=low&id=<?php echo $_GET['id'] ;?> '" />
             <input type="button" value="Najlepsze" onclick="window.location.href='Read_Article.php?cSort=high&id=<?php echo $_GET['id'] ;?> '" />
        </font>
    </form>
    <!-- Komentarze -->
     <?php foreach($comments as $comment) { ?>
        <font size = "2" color = "black">
             <h1> 
                    <?php echo $comment['Name']." ".$comment['InsertDate']." "."głosy: ".$comment['Votes']; ?>
              </h1>
        </font>
        <p>
              <font size ="4" color ="red">
                  <?php echo $comment['Content']; ?>
              </font>
        </p>
       
        <From>
            <input type="button" value="+" onclick="window.location.href='comments/vote-action.php?value=1&comID=<?php echo $comment['CommentID'] ;?> '" />
            <input type="button" value="-" onclick="window.location.href='comments/vote-action.php?value=-1&comID=<?php echo $comment['CommentID'] ;?> '" />
        </Form>
        <br/>
    <?php } ?> 
    <!-- koniec foreach -->
    <br/><br/>
    <?php if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
     { 
          if(isset($_GET['error']))
                {
                    echo $_GET['error'];
                }
            $_SESSION['ArticleID'] = $_GET['id']; 
           
            /* echo "session: ".$_SESSION['ArticleID'];
            echo "GET".$_GET['id'];
            exit(); */  
       
     ?>
        <form action="<?php $dir?>comments/comment-action.php" method="post" autocomplete="off">
               <textarea rows="15" cols="50" placeholder="Treść Komentarza" name="Treść_Kom"></textarea></br></br>
               <input type="submit" value="Dodaj Komentarz" />
         </form>
   
    <?php }
    else echo"Jeśli chcesz dodać komentarz - Zaloguj się "; ?>
     <br/><br/><br/><br/><br/>
    </body>
</html>