
<?php
// Connexion à la base de données 
try 
{
	$bdd = new PDO('mysql:host=localhost;dbname=ma_base', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{		
		die('Erreur : '.$e->getMessage());
}
	
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO table_news (pseudo, texte) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['texte']));
// Redirecton du visiteur vers le page du minichat 
	echo 'Merci de ta participation !';
?>
