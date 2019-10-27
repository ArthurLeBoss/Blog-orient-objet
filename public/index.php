<?php

require_once '../includes/config.php';

$pt = new PostTable();

$articles = $pt->all();
session_start();

// if (isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['categorie'])) {
//     $article = new Post();
//     $article->setTitle($_POST['titre']);
//     $article->setContent($_POST['contenu']);
//     $article->setCategorie($_POST['categorie']);
//     $pt->create($article);
// }

if (isset($_GET['del'])) {
    $getid = intval($_GET['del']);
    $pt->delete($getid);
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog</title>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- <link href="../css/style.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../css/style.css">
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
                    <?php
                        if (isset($_SESSION['pseudo'])) {

                            echo '<a class="btn btn-warning btn-sm" href="../page/deconnexion.php" role="button">Deconnexion</a>
                            <a class="nav-item nav-link" href="../page/ajouter.php">Ajouter un article</a>';
                        } else {

                            echo '<a class="btn btn-warning btn-sm" href="../page/connexion.php" role="button" data-toggle="modal" data-target="#basicExampleModal">Connexion</a>
                            <a class="btn btn-info btn-sm" href="../page/inscription.php" role="button">Inscription</a>';
                        }
                    ?>
                </div>
        </div>
        <?php
        if (isset($_SESSION['pseudo'])) {
            $user = $_SESSION['pseudo'];
            // afficher un message
            echo '<p style="color: white;text-align: right;">Vous êtes connecté en tant que ' . $user . '</p>';
        }

        ?>
    </nav>
    <!-- Fin barre de nav-->

    <div class="container">
        <h1 class="text-center">Blog de ouf :)</h1>

        <div class="row">
            <?php foreach ($articles as $article) : ?>
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

    <!-- Modal -->
    <div class="modal fade left" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-slide modal-top-left" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 10%;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../page/connexion.php">
                        <label for="titre">Email</label>
                        <input type="text" name="email" class="form-control">
                        <label for="titre">Mot de passe</label>
                        <input type="text" name="mdp" class="form-control" style="margin-bottom: 2%;">
                        <input class="form-control" id="submit2" name="submit2" type="submit" value="Valider">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-4 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Arthur 2019</p>
        </div>
    </footer>

    <!-- JQuery -->
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.js"></script>
</body>

</html>