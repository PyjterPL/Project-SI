<?php 
 $dir = getcwd();
require_once('connection.php');
require_once('article_class.php');
require_once('articles_categories_class.php');
require_once($dir.'/comments/comment_class.php');
$article = new Article;
$specific = $article->fetch_data($_GET['id']);
$comment = new Comment;

$category = new Category;
$categories = $category->fetch_all();

if(isset($_GET['cSort']))
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
else $comments = $comment->fetch_last($_GET['id']);


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

    
      
      <!-- Artykuł -->
      <div id="article-read">
     <article>
        <font size="10" color = "black"> 
              <h1>
              <?php	if(!empty($specific['Image']))echo '<img height="100" width="100" src="data:image/jpeg;base64,'.base64_encode( $specific['Image'] ).'"/>'; ?>
                    <?php echo $specific['Title'];?>
              </h1>
       </font>
       <font size ="4" color = "grey">
           <p>
              <?php echo $specific['Content']; ?>
          </p>
       </font> 
     </article>
     </div>


    <!-- Sposób sortowania komentarzy -->
    <div id="komentarze">
     <form>
        <font size="2" color ="black">Sortowanie Komentarzy
             <input type="button" value="Najstarsze" onclick="window.location.href='Read_Article.php?cSort=first&id=<?php echo $_GET['id'] ;?> '" />
             <input type="button" value="Najnowsze" onclick="window.location.href='Read_Article.php?cSort=last&id=<?php echo $_GET['id'] ;?> '" />
             <input type="button" value="Najgorsze" onclick="window.location.href='Read_Article.php?cSort=low&id=<?php echo $_GET['id'] ;?> '" />
             <input type="button" value="Najlepsze" onclick="window.location.href='Read_Article.php?cSort=high&id=<?php echo $_GET['id'] ;?> '" />
        </font>
    </form>
                </div>
    


    
    <!-- Komentarze -->
     <?php foreach($comments as $comment) { ?>

        <div id="komentarze-wpis">

        <font size = "6" color = "black">
             
                    <?php echo $comment['Name']." ".$comment['InsertDate']." "."głosy: ".$comment['Votes']; ?>
              
        </font>
        <p>
              <font size ="4" color ="grey">
                  <?php echo $comment['Content']; ?>
              </font>
        </p>
       
        <From>
            <input type="button" value="+" onclick="window.location.href='comments/vote-action.php?value=1&comID=<?php echo $comment['CommentID'] ;?> '" />
            <input type="button" value="-" onclick="window.location.href='comments/vote-action.php?value=-1&comID=<?php echo $comment['CommentID'] ;?> '" />
        </Form>
        
     </div>
    <?php } ?> 
    <!-- koniec foreach -->


   
    <div id="dodaj-komentarz">
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
               <textarea rows="8" cols=80 placeholder="Treść Komentarza" name="Treść_Kom"></textarea></br></br>
               <input type="submit" value="Dodaj Komentarz" />
         </form>
         </div>
    <?php }
    else echo"Jeśli chcesz dodać komentarz - Zaloguj się "; ?>
     

            
     </div>

    <div id="FOOTER">

        <h2>&copy; 2018 Politechnika Śląska wydział Elektryczny Informatyka Sekcja 5 Sem V
            <p>Strona ta powstała na potrzeby projektu z przedmiotu "Serwisy Internetowe" jej autorami są Snopek Jan, Sladkowski Konrad, Zuber Piotr</P>
        </h2>

    </div>
    </body>
</html>