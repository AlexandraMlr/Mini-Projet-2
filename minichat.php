<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <title>Mini-chat</title>
	</head>
	<style>
	form
	{
		text-align: center,
	}
	</style>
	<body>
	
	<table border="0" align="center" cellpadding="3" cellspacing="3" 
	<form action="minichat_post.php" method="post">
		<p>
		<p>Laissez-nous un message ;)</p>
		<label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo"/><br />
		<label for="message">Message</label> : <input type="text" name="message" id="message"/><br />
		<input type="submit" value="Envoyer" />
		</p>
	</form>

<?php 
//Connexion à la base de donnée 

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ma_base', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages 
$reponse = $bdd->query('SELECT pseudo,message FROM table_news ORDER BY ID DESC LIMIT 0, 10');

	echo '<p>D autres ont aussi laissé leurs avis sur ce site :</p>';

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
    echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';	
}

$reponse->closeCursor();
?>
<?php
lect()
?>

	
	</body>
</html>
