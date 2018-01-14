<?php
require_once('../connection.php');
require_once('../comment_class.php');
session_start();
$comment = new Comment ;
if(!isset($_SESSION['logged']) && !($_SESSION['logged']==true))
{
    header('Location: index.php');
    exit();
}

if(isset($_POST['Treść_Kom']))
{
    $insertdate=date('Y-m-d G:i:s');
    $A_ID =(int) $_SESSION['ArticleID'];
    $Tresc = $_POST['Treść_Kom'];
    $U_ID=(int)$_SESSION['UserID'];

   // $query=$pdo->prepare('INSERT INTO comments(CommentID,ArticleID,InsertDate,Content,UserID,Votes) VALUES("",?,?,?,?,"")');

   $query=$pdo->prepare("INSERT INTO comments(CommentID,ArticleID,InsertDate,Content,UserID,Votes) VALUES('','$A_ID','$insertdate','$Tresc','$U_ID','')");
  
   //$query=$pdo->prepare('INSERT INTO comments(CommentID,ArticleID,InsertDate,Content,UserID,Votes) VALUES(?,?,?,?,?,?)');
 
  /*
    $query->bindValue(1, $A_ID,PDO::PARAM_INT);
    $query->bindValue(2,$insertdate,PDO::PARAM_STR);
    $query->bindValue(3,$A_ID,PDO::PARAM_INT);
    $query->bindValue(4,$U_ID,PDO::PARAM_INT);
   
    $query->bindValue(1, NULL);
    $query->bindValue(2, $A_ID);
    $query->bindValue(3, $insertdate);
    $query->bindValue(4, $Tresc);
    $query->bindValue(5, $U_ID);
    $query->bindValue(6, NULL);
 */
    $query->execute();
 //echo $query->queryString;
 //   exit();

    header("Location: ../Read_Article.php?id=$A_ID");
   
}
else
 {
    $error="Uzupełnij wymagane pola";
    header("Location: ../Read_Article.php?error=$error");
    
}
?>
