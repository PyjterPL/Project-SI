<?php
class User
{
    public function fetch_all()
    {
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM users");
        
        $query->execute();

        return $query->fetchAll();
    }
    public function fetch_data($UserID)
    {
        global $pdo;
        $query = $pdo->prepare("SELECT * from users WHERE UserID=?");
        $query->bindValue(1,$UserID);
        $query->execute();

        return $query->fetch();
    }
    public function delete_user($UserID)
    {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM users WHERE UserID=?");
        $query->bindValue(1,$UserID);
        $query->execute();
    }

}

?>