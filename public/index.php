<?php

require_once '../includes/config.php';

$pt = new PostTable();

$articles = $pt->all();

// if (isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['categorie'])) {
//     $article = new Post();
//     $article->setTitle($_POST['titre']);
//     $article->setContent($_POST['contenu']);
//     $article->setCategorie($_POST['categorie']);
//     $pt->create($article);
// }

if(isset($_GET['del']))
{
  $getid = intval($_GET['del']);
  $pt->delete($getid);
  header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
	<link href="../css/mdb.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" type="text/css" >
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-md navbar-expand-lg scrolling-navbar top-nav-collapse" style="padding-top: 5px; padding-bottom: 5px; background-color: #22313f;">
			<a class="navbar-brand" style="color: white" href="#">Voir les articles</a>
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="navbar-collapse collapse" id="navbarSupportedContent-7">
				<ul class="navbar-nav mr-auto">
			  	<div class="navbar-nav">
				<a class="nav-item nav-link" href="../page/ajouter.php">Ajouter un article</a>
                <!-- <a class="btn btn-info btn-sm" href="../page/inscription.php" role="button">Inscription</a>
                <a class="btn btn-warning btn-sm" href="../page/connexion.php" role="button">Connexion</a> -->
			  </div>
			</div>
	 </nav>
    <!-- Fin barre de nav-->

    <div class="container">
        <h1 class="text-center">Blog de ouf :)</h1>
        <div class="row">
                <?php foreach($articles as $article): ?>
                    <div class="card col-5" style="width: 15rem; margin: 2%;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $article['titre'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $article['categorie'] ?></h6>
                            <p class="card-text"><?= $article['contenu'] ?></p>
                            <a class="btn btn-info btn-sm" href="../page/afficher.php?id=<?= $article['id'] ?>" role="button">Afficher</a>
                            <a class="btn btn-success btn-sm" href="../page/modifier.php?id=<?= $article['id'] ?>" role="button">Modifier</a>
                            <a class="btn btn-danger btn-sm" href="index.php?del=<?= $article['id'] ?>" role="button" id="submit_suppr" name="submit_suppr">Supprimer</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>        
    </div>

    <!-- Footer -->
    <footer class="py-4 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Arthur 2019</p>
        </div>
    </footer>
</body>
</html>
