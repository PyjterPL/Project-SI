<?php
class Article
{
    public function fetch_all()
    {
       global $pdo;
        $query = $pdo->prepare("SELECT * FROM articles");
        
        $query->execute();

        return $query->fetchAll();
    }
    public function fetch_data($article_id)
    {
        global $pdo;
        $query = $pdo->prepare("SELECT * from articles WHERE ArticleID=?");
        $query->bindValue(1,$article_id);
        $query->execute();

        return $query->fetch();
    }
    public function delete_article($article_id)
    {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM articles WHERE ArticleID=?");
        $query->bindValue(1,$article_id);
        $query->execute();
    }

    public function fetch_last()
    {
        // Domyślnie przjmuje się 5 najświeższych "newsów" 
        
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM articles ORDER BY ArticleID DESC LIMIT 5");
        $query->execute();
        
        return $query->fetchAll();
    }
    public function select_by_title($searchString)
    {
        global $pdo;
        $query=$pdo->prepare("SELECT * FROM articles WHERE Title LIKE '%$searchString%' ");
      //  $query->bindValue(1, $searchString);
      //  echo "<pre>"; print_r( $query);
        $query->execute();
        return $query->fetchAll();
    }
    public function select_by_tags($searchString)
    {
        global $pdo;
        $query=$pdo->prepare("SELECT * FROM articles WHERE Tags LIKE '%$searchString%' ");
      //  $query->bindValue(1, $searchString);
      //  echo "<pre>"; print_r( $query);
        $query->execute();
        return $query->fetchAll();
    }
    public function select_by_author($searchString)
    {
        global $pdo;
        $query=$pdo->prepare("SELECT * FROM articles WHERE Author LIKE '%$searchString%' ");
      //  $query->bindValue(1, $searchString);
      //  echo "<pre>"; print_r( $query);
        $query->execute();
        return $query->fetchAll();
    }
    public function select_by_category($categoryID)
    {
        global $pdo;
        $query=$pdo->prepare("SELECT * FROM articles WHERE CategoryID =?");
        $query->bindValue(1, $categoryID);
      //  echo "<pre>"; print_r( $query);
        $query->execute();
        return $query->fetchAll();
    }

 
}

?>
