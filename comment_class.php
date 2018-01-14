<?php
class Comment
{
    public function fetch_all()
    {
       global $pdo;
        $query = $pdo->prepare("SELECT * FROM comments");
        
        $query->execute();

        return $query->fetchAll();
    }
    public function fetch_data($comment_id)
    {
        global $pdo;
        $query = $pdo->prepare("SELECT * from comments WHERE CommentID=?");
        $query->bindValue(1,$comment_id);
        $query->execute();

        return $query->fetch();
    }
    public function delete_article($comment_id)
    {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM comments WHERECommentID=?");
        $query->bindValue(1,$comment_id);
        $query->execute();
    }

    public function fetch_last($article_id)
    {   
        global $pdo;
        $query = $pdo->prepare("SELECT Content,Name,votes,InsertDate FROM comments inner join users on comments.UserID = users.UserID where comments.ArticleID=? ORDER by CommentID desc");
        $query->bindValue(1,$article_id);
        $query->execute();
        
        return $query->fetchAll();
    }

 
}

?>