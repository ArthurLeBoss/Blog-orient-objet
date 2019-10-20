<?php

    require_once '../includes/config.php';
    $pt = new PostTable();
    

    if (isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['categorie'])) {
        $article = new Post();
        $article->setTitle($_POST['titre']);
        $article->setContent($_POST['contenu']);
        $article->setCategorie($_POST['categorie']);
        $pt->create($article);
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
            <h1>Ajout Article</h1>

            <form method="post" action="">
                <label for="titre">Titre</label>
                <input type="text" name="titre" class="form-control">
                <label for="titre">Categorie</label>
                <input type="text" name="categorie" class="form-control">
                <div class="form-group">
                    <label for="contenu">Contenu</label>
                    <textarea type="text" name="contenu" class="form-control" id="contenu" rows="10" ></textarea>
                </div>

                <input class="form-control" id="submit2" name="submit2" type="submit" value="Valider">
            </form> 
        </div>

</body>

</html>