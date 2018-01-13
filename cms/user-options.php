<?php
require_once('../connection.php');
require_once('../user_class.php');
$user = new User;
$users = $user->fetch_all();
session_start();
?>

<html>
<head>
    <title>CMS</title>
    <link rel="stylesheet" href="admin-panel-style.css" /> 
</head>
<body>
    <div class="container">
<a href="../index.php" id="logo">Strona glowna</a>
</br>
<a href="user-add.php" id="logo">Dodaj użytkownika</a>
    <ol>
        <?php foreach($users as $user) { ?>
        <li>
            <a href="user-edit.php?id=<?php echo $user['UserID']; ?>">
            <?php echo $user['Name']; ?>
            </a>
            <a href="user-delete.php?id=<?php echo $user['UserID']; ?>">
            Usuń</a>
            <a href="user-edit.php?id=<?php echo $user['UserID']; ?>">
             Edytuj</a>
        <?php } ?>
    </ol>
    </div>
</body>
</html>
