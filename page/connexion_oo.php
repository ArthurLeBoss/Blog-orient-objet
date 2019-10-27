<?php

    #Tentative de connexion en orientée objet. Je n'ai malheuresement pas réussi.

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
        $pt->update_pass($membres);
        $query=$db->prepare('SELECT ID, pseudo, pass, mail
        FROM membres WHERE mail = :email');
        $pass_hash = $data['pass'];
        $query->bindValue(':email',$_POST['email'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
	if (password_verif($data['pass'], $pass_hash)) // Acces OK !
	{
        echo $pass_hash;
	    $_SESSION['pseudo'] = $data['pseudo'];
	    $_SESSION['id'] = $data['ID'];
	    $message = '<p>Bienvenue '.$data['pseudo'].', 
			vous êtes maintenant connecté!</p>
			<p>Cliquez <a href="../public/index.php">ici</a> 
			pour revenir à la page d accueil</p>';  
	}
	else // Acces pas OK !
	{
	    $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
            entré n\'est pas correcte.</p><p>Cliquez <a href="../public/index.php">ici</a> 
	    pour revenir à la page d\'accueil</p>';
	}
    $query->CloseCursor();
    }
    echo $message.'</div></body></html>';

?>
