<?php
session_start();
session_destroy();
require_once '../includes/config.php';
echo '<p>Vous êtes à présent déconnecté <p> <br />
Cliquez <a href="../public/index.php">ici</a> pour revenir à la page principale</p>';
?>
