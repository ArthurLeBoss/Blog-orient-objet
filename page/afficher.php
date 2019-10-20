<?php

    require_once '../includes/config.php';
    $pt = new PostTable();
    $id = $_GET['id'];
    $recup = $pt->get($id);

?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <title>Mon blog</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
	<link href="../css/mdb.css" rel="stylesheet">
	<!--CSS-->
	<link rel="stylesheet" href="../css/style.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

  <!-- Barre de navigation -->
  <nav class="navbar navbar-expand-md navbar-expand-lg scrolling-navbar top-nav-collapse" style="padding-top: 5px; padding-bottom: 5px; background-color: #22313f;">
    <a class="navbar-brand" style="color: white" href="../public/index.php">Voir les articles</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarSupportedContent-7">
        <ul class="navbar-nav mr-auto">
          <div class="navbar-nav">
        <a class="nav-item nav-link" href="ajouter.php">Ajouter un article</a>
      </div>
    </div>
</nav>
<!-- Fin barre de nav-->

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-12">
       
            <!-- Titre -->
            <h1 class="display-4"><?= $recup->getTitle()?></h1>
            <!-- Catégorie -->
            <h2 class="display-5"><?=$recup->getCategorie()?></h2>
            <!-- Post Content -->
            <p class="lead"><?=$recup->getContent()?></p>
            <a class="btn btn-success btn-sm" href="modifier.php?id=<?= $recup->getId() ?>" role="button">Modifier</a>
            <a class="btn btn-danger btn-sm" href="../public/index.php?del=<?= $recup->getId() ?>" role="button" id="submit_suppr" name="submit_suppr">Supprimer</a>
        
      </div>

      </div>

    </div>
    <!-- /.row -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Arthur 2019</p>
    </div>
    <!-- /.container -->
  </footer>

</body>

</html>
