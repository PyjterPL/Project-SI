<?php
class Category
{
    public function fetch_all()
    {
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM articlecategories");
        
        $query->execute();

        return $query->fetchAll();
    }
    public function fetch_data($categoryID)
    {
        global $pdo;
        $query = $pdo->prepare("SELECT * from articlecategories WHERE CategoryID=?");
        $query->bindValue(1,$categoryID);
        $query->execute();

        return $query->fetch();
    }
    public function delete_category($categoryID)
    {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM articlecategories WHERE CategoryID=?");
        $query->bindValue(1,$categoryID);
        $query->execute();
    }

}

?>