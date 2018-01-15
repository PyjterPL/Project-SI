<?php
require_once('../connection.php');
require_once('comment_class.php');
session_start();
if(!(isset($_SESSION['logged'])) || !($_SESSION['logged']==true))
{
   header('Location: index.php');
}
$vote_val=$_GET['value'];
$insertdate=date('Y-m-d G:i:s');
$U_ID=(int)$_SESSION['UserID'];
$C_ID= (int)$_GET['comID'];
$A_ID =(int) $_SESSION['ArticleID'];
    
    $query =$pdo->prepare("SELECT VoteValue FROM votes WHERE UserId='$U_ID'AND CommentID='$C_ID' ");
    $query->execute();
    $check= $query->fetch();

    if($check['VoteValue']==1 || $check['VoteValue']==(-1))
    {
        $comm_err="Zagłosowano na ten komentarz";
      //  echo "Zagłosował";
     
        header("Location: ../Read_Article.php?error=$comm_err&id=$A_ID");
        exit();
    }
    $query=$pdo->prepare("INSERT INTO votes(VoteID,UserID,CommentID,Votedate,VoteValue) VALUES('','$U_ID','$C_ID','$insertdate','$vote_val')  ");
    $query->execute();

    $query=$pdo->prepare("UPDATE comments SET Votes=Votes+'$vote_val' WHERE comments.CommentID='$C_ID'");
    $query->execute();

    header("Location: ../Read_Article.php?id=$A_ID");
    //$query=$pdo->prepare("INSERT INTO votes(VoteID,UserID,CommentID,VodeDate,VoteValue,) VALUES('','$U_ID','$C_ID','$insertdate','','$vote_val')");

?>