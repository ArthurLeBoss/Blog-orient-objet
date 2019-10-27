<?php
    require_once '../includes/config.php';
    $pt = new PostTable();

    if(!empty($_POST['register']))
    {
        
        if(!empty($_POST['pseudo']) && !empty($_POST['mail']  && !empty($_POST['pass'])))
        {
            if($_POST['pass_confirm'] == $_POST['pass'])
            {
                $membres->setPseudo($_POST['pseudo']);
                $membres->setMail($_POST['mail']);
                $membres->setPass($_POST['pass']);
                register($membres);
                header('location:../public/index.php');
            }
            else {

                echo("erreur");
            }
            
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
	<link href="../css/mdb.css" rel="stylesheet">
	<!--CSS-->
	<link rel="stylesheet" href="../css/style.css" type="text/css" />
    <title>Document</title>
</head>
<body>
<div class="in">
    <div class="article">
    <h1>Inscription</h1>
        <form method="post" action="">
            <label for="titre">Pseudo</label>
            <input type="text" name="pseudo" class="form-control" placeholder="Entrer votre pseudo...">
            <label for="titre">Email</label>
            <input type="text" name="mail" class="form-control" placeholder="Entrer votre mail...">
            <label for="contenu">Mot de passe</label>
            <input type="password" id="password" name="pass" placeholder="Entrer votre mot de passe..." class="form-control">
            <label for="contenu">Mot de passe (confirmation)</label>
            <input type="password" id="password" name="pass_confirm" placeholder="Confirmation du mot de passe..." class="form-control" style="margin-bottom: 2%;">
            <input class="form-control" id ="submit1" name="register" type="submit" value="Valider">
    </form>
</div>
</body>
</html>