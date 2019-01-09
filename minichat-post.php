<!DOCTYPE html>
<html>

<?php
// Connexion à la base de données 
	$bdd = new PDO ('mysql:host=localhost;dname=ma_base', 'root', '');
// Insertion du message à l'aide d'une requête préparée
	$req = $bdd->prepare('INSERT INTO table_news(titre, texte) VALUES(?, ?)');
	$req->execute(array($_POST['pseudo'],$_POST['message']));
	
// Redirecton du visiteur vers le pape du minichat 
	header('Location: minichat.php');
?>

<?php
//Effectuer ici la requête qui insère le message
//Puis rediriger vers minichat.php comme ceci :
header('Location: minichat.php');
?>

</html>
