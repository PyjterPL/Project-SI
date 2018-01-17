<!DOCTYPE HTML>

<html>

<head>

<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Projekt SI</title>
        <meta name="description" content="test">
        <link rel="stylesheet" href="CSS/main.css">
        <link rel="stylesheet" href="CSS/Login.css">
</head>

<body>


<?php
require_once('connection.php');
require_once('article_class.php');

session_start();
$article = new Article;
$searchString;
$type;
if(isset($_POST['search-string']) && isset($_POST['search-type']))
{


    $searchString = $_POST['search-string'];
    $type = $_POST['search-type'];
}
elseif(isset($_GET['search-string']) && isset($_GET['search-type']))
{
    $searchString = $_GET['search-string'];
    $type = $_GET['search-type'];
}

if(!empty($article) && !empty($searchString)){
    switch($type)
    {
        case "title":
        $articles =  $article->select_by_title($searchString);
        break;
        case "author":
        $articles =  $article->select_by_author($searchString);
        break;
        case "tags":
        $articles =  $article->select_by_tags($searchString);
        break;
        case "category":
        $articles =  $article->select_by_category($searchString);
        break;
    }






    if(empty($articles))
    {
        echo '<div id="container">';
        echo '<div id="search-edit"> <label>Brak wyników</label></div>';
        echo '<input type="button" value="Powrót" onclick="window.location.href=\'article-search.php\'"/>' ;
        echo '<input type="button" value="Strona główna" onclick="window.location.href=\'index.php\'"/>' ;
        echo '</div>';
    }


    else{?>
        <div id="search-navi">
           
        <input type="button" value="Szukaj" onclick="window.location.href='article-search.php'" /> 
        <input type="button" value="Strona główna" onclick="window.location.href='index.php'" /> 
   
        </div>
        <?php
    	foreach($articles as $article) { ?>
            <article>
                <div id="Wpis-search">
                    <div id="Article-search">

                        <a href="Read_Article.php?id=<?php echo $article['ArticleID'];?>"> 
                        
                        <font size="10" color="black"> 
                        <?php	if(!empty($article['Image']))echo '<img height="100" width="100" src="data:image/jpeg;base64,'.base64_encode( $article['Image'] ).'"/>'; ?>
                        <?php echo $article['Title']; ?> 
                        </font>  
                        
                        </a>
                        
                        <div id="image-div">
						</div>
                        <font size = "4" color = "grey"> 
                        <?php echo $article['Introduction']; ?> 
                        </font>
                        
                        </div>

                </div>

            </article>
      
    
    <?php }  
    }
}

    
   
   // print_r($articles);
   /* $id = $_GET['id'];
    if(isset($_POST['name']))
    {
    $name = $_POST['name'];
 
        if(empty($name))
        {
            $error="Uzupełnij wymagane pola";
            header("Location: category-edit.php?error=$error&id=$userID");
            exit();
        }
    

  
       
              
                    $query=$pdo->prepare('UPDATE articlecategories SET Name=? WHERE CategoryID=?');
                    $query->bindValue(1, $name);
                    $query->bindValue(2, $id);
                // $query->bindValue(7, $id);
                    $query->execute();
                    header('Location: categories-options.php');
                    exit();*/
                
            
   // }
//}
else
{
    //echo $_POST['search-string']; 
  //  echo $_POST['search-type'];
    header('Location: index.php');
    exit();
}
?>


</body>

</html>