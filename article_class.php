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

 
}

?>
