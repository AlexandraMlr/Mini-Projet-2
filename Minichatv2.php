<!DOCTYPE html>
<html>
<head>
<title>Mini-chat</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-
8859-1" />

</head>
<body>
<form action="minichat_post.php" method="post">
<p>
<label for="pseudo">Pseudo</label> : <input type="text"
name="pseudo" id="pseudo" /><br />
<label for="texte">Texte</label> : <input
type="text" name="texte" id="texte" /><br />
<input type="submit" value="Envoyer" />
</form>
<?php 
//Connexion à la base de donnée 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ma_base', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
// Récupération des 10 derniers messages 
 $reponse = $bdd->query('SELECT pseudo, texte FROM table_news ORDER BY ID DESC LIMIT 0, 10');

	echo '<p>D\'autres ont aussi laissé leurs avis sur ce site :</p>';
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) .
	'</strong> : ' . htmlspecialchars($donnees['texte']) . '</p>';
}
$reponse->closeCursor();
?>


	
	</body>
</html>
