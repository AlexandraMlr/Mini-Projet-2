<!DOCTYPE html>
<html>
	<head>
		<title>Mini-Chat</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	</head>
	
	<body>
	
	<form action="minichat_post.php" method="post">
		<p>
		<label for="pseudo">Pseudo</label> : <input type="text" name="titre" id="titre"/><br />
		<label for="texte" id="texte" /><br />
		<input type="submit" value="Envoyer" />
	</form>


<?php 
//Connexion à la base de donnée 
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=ma_base', 'root', '');
	// Récupération des  derniers messages 
	$reponse = $bdd->query('SELECT titre, texte FROM table_news ORDER BY ID DESC LIMITE 0, 10');
	
	//Affichage  de chaque message (toutes les données sont protégées par htmlspecialchars)
	while ($donnees = $reponse->fetch())
	{
		echo '<p><strong>' . htmlspecialchars($données['titre']) . '</strong> : ' . htmlspecialchars($donnees['texte']) . '</p>';
	}
	$reponse->closeCursor();
?>
	
	</body>
</html>
