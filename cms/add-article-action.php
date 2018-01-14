<?php
require_once('../connection.php');
require_once('../article_class.php');
//test git
session_start();
$article = new Article;
if(isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{
    if(isset($_POST['title']) && isset($_POST['introduction']) && isset($_POST['content']) && isset($_POST['tags']))
    {
    $title = $_POST['title'];
    $introduction = $_POST['introduction'];
    $content = $_POST['content'];
    $tags = $_POST['tags'];
    $insertdate=date('Y-m-d G:i:s');
    $userID= $_SESSION['UserID'];
    $categoryID=(int)$_POST['category'];
        
        if(empty($title) or empty($introduction) or empty($content) or empty($tags))
        {
            $error="Uzupełnij wymagane pola";
            header("Location: article-add.php?error=$error");
            exit();
        }
       // echo $_FILES['obrazek']['tmp_name'];
        if(is_uploaded_file($_FILES['obrazek']['tmp_name']))
        {
            $file = file_get_contents($_FILES['obrazek']['tmp_name']);
        $max = 1024 * 64;
        $wielkosc_pliku = $_FILES['obrazek']['size'];
      //  $typ_pliku = $_FILES['plik']['type'];
      //  $nazwa_pliku = $_FILES['plik']['name'];
      //  $tymczasowa_nazwa_plku = $_FILES['plik']['tmp_name'];
       // $miejsce_docelowe = './obrazki/'.$nazwa_pliku;
       
        if ($wielkosc_pliku> $max)
            {
                // echo 'Plik jest za duzy. Maksymalnie mozna wysłać plik o wielkosci'.$max.'.';
                $error="Plik jest za duzy.Maksymalnie mozna wysłać plik o wielkosci $max KB";
                header("Location: article-add.php?error=$error");
                exit();
            }      
            $query=$pdo->prepare('INSERT INTO articles(CategoryID,UserID,Title,Introduction,InsertDate,Tags,Content,Image) VALUES(?,?,?,?,?,?,?,?)');
            $query->bindValue(1, $categoryID);
            $query->bindValue(2, $userID);
            $query->bindValue(3, $title);
            $query->bindValue(4, $introduction);
            $query->bindValue(5, $insertdate);
            $query->bindValue(6, $tags);
            $query->bindValue(7, $content);
            $query->bindValue(8, $file);
            $query->execute();
            header('Location: articles-options.php');
            exit();
        }
        else // nie dodajemy pliku
        {
          
           $query=$pdo->prepare('INSERT INTO articles(CategoryID,UserID,Title,Introduction,InsertDate,Tags,Content) VALUES(?,?,?,?,?,?,?)');
            $query->bindValue(1, $categoryID);
            $query->bindValue(2, $userID);
            $query->bindValue(3, $title);
            $query->bindValue(4, $introduction);
            $query->bindValue(5, $insertdate);
            $query->bindValue(6, $tags);
            $query->bindValue(7, $content);
            $query->execute();
            header('Location: articles-options.php');
            exit();
        }
    }
}
else
{
    header('Location: ../index.php');
    exit();
}
?>
