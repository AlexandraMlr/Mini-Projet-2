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
$req = $bdd->prepare('INSERT INTO minichat (pseudo, texte) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['texte']));
// Redirecton du visiteur vers le page du minichat 
	echo 'Merci de ta participation !';
?>

</body>
</html>
