<?php

    require_once '../includes/config.php';
    $pt = new PostTable();
    $id = $_GET['id'];
    $recup = $pt->get($id);
    


if (isset($_POST['submit2']))
        {
            $article = new Post();
            $article->setId($_GET['id']);
            $article->setTitle($_POST['titre']);
            $article->setContent($_POST['contenu']);
            $article->setCategorie($_POST['categorie']);
            $pt->update($article);
            header('location:../public/index.php');
        }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mini-blog</title>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
	<link href="../css/mdb.css" rel="stylesheet">
	<!--CSS-->
	<link rel="stylesheet" href="../css/style.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="in">
        <div class="article">
            <h1>Modification d'article</h1>

            <form method="post" action="">
                <label for="titre">Titre</label>
                <input type="text" name="titre" class="form-control" value="<?= $recup->getTitle()?>">
                <label for="titre">Categorie</label>
                <input type="text" name="categorie" class="form-control" value="<?= $recup->getCategorie()?>">
                <div class="form-group">
                    <label for="contenu">Contenu</label>
                    <textarea type="text" name="contenu" class="form-control" id="contenu" rows="10" ><?= $recup->getContent()?></textarea>
                </div>

                <input class="form-control" id="submit2" name="submit2" type="submit" value="Valider">
            </form> 
        </div>

</body>

</html>