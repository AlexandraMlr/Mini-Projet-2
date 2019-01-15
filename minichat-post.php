<!DOCTYPE html>
<html>
<body>

<?php
// Connexion à la base de données 
try 
{
	$bdd = new PDO ('mysql:host=localhost;dname=ma_base;charset=utf8', 'root', '');
}
catch(Exception $e)
{		
		die('Erreur : '.$e->getMessage());
}
	
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

// Redirecton du visiteur vers le pape du minichat 
	echo 'Merci de ta participation !';

?>

</body>
</html>
