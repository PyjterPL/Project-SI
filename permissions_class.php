<?php
class Permission
{
    public function fetch_all()
    {
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM permissions");
        
        $query->execute();

        return $query->fetchAll();
    }
    public function fetch_data($PermissionID)
    {
        global $pdo;
        $query = $pdo->prepare("SELECT * from permissions WHERE PermissionID=?");
        $query->bindValue(1,$PermissionID);
        $query->execute();

        return $query->fetch();
    }

}

?>