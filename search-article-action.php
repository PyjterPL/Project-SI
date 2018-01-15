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
        echo "Brak wyników";
    }
    else{
    	foreach($articles as $article) { ?>
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