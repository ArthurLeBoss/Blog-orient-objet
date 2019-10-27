<?php

    session_start();
    require_once '../includes/config.php';
    $pt = new PostTable();
    $message='';
    if (empty($_POST['email']) || empty($_POST['mdp']) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    }
    else //On check le mot de passe
    {
        $query=$db->prepare('SELECT id, pseudo, pass, mail
        FROM membres WHERE mail = :email');
        $query->bindValue(':email',$_POST['email'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
	if ($data['pass'] == $_POST['mdp']) // Acces OK !
	{
	    $_SESSION['pseudo'] = $data['pseudo'];
	    $_SESSION['id'] = $data['id'];
	    $message = '<p>Bienvenue '.$data['pseudo'].', 
			vous êtes maintenant connecté!</p>
			<p>Cliquez <a href="../public/index.php">ici</a> 
			pour revenir à la page d accueil</p>';  
	}
	else // Acces pas OK !
	{
	    $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou l\'email
            entré n\'est pas correcte.</p><p>Cliquez <a href="../public/index.php">ici</a> 
	    pour revenir à la page d\'accueil</p>';
	}
    $query->CloseCursor();
    }
    echo $message.'</div></body></html>';

?>
