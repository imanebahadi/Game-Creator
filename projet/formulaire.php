<!DOCTYPE html>
<html>
<head>  <meta charset="utf-8" /> 
<link href="css/style.css" rel="stylesheet" media="all" type="text/css">
</head>
<body> 

    <?php include('static/header.php'); ?>
        <?php include('statistiques.php'); ?>

    <div id="menu">
    <?php include('static/menu.php'); ?>
    </div>
<section id="sectionFormulaire1">  
<form method="post" action="">

   	<label for="afficheur">Sélectionner quelle table voulez-vous afficher ! : </label>
   		
   	<select name="afficheur" id="afficheur">
   	<option value="1">creature</option>
  	<option value="2">mobilier</option>
  	<option value="3">piege</option>
   	</select>
<br/>
	 <input type="submit" value="Envoyer"  />
</form>
</section>  
<?php

$server ="localhost"; 
$user ="p1907992";
$mdp ="litmus";
$bd ="p1907992"; 

echo '<section id="sectionFormulaire2">';   
function connectBD($server, $user, $mdp, $bd) {
	$connexion=mysqli_connect($server, $user, $mdp, $bd  );
	if(mysqli_connect_errno()) 
	{
		printf("Échec de  la  connexion: %s\n",mysqli_connect_error());
		exit();
	}
	return $connexion;
}

$connexion= connectBD($server, $user, $mdp, $bd);	
mysqli_query($connexion,"SET NAMES 'utf8'");

if($_POST['afficheur'] == 1)
{ 
	$requete='SELECT DISTINCT * FROM p1907992.CREATURE;';
	$resultat= mysqli_query($connexion,$requete);

echo'<h2 >Liste des creatures </ h2 >'; 

echo ' <table> 

	<tr> 
		<th> IDC </th> 
		<th> NomC  </th>
		<th> CategorieP </th>
		<th> Pieces </th>
		<th> Attaque  </th>
		<th> Vie  </th>
		<th> Climat </th>
		<th> Difficulté  </th>
		<th> nomEnv  </th>
	</tr> ';
$nb = mysqli_num_rows($resultat);
for ($i=0;$i<$nb;$i++) {	
	$row = mysqli_fetch_row($resultat);
	echo '
		<tr> 
			<td> '.$row[0].'  </td> 
			<td> '.$row[1].' </td>
			<td> '.$row[2].'  </td>
			<td> '.$row[3].' </td>
			<td> '.$row[4].'  </td>
			<td> '.$row[5].'  </td>
			<td> '.$row[6].'  </td>
			<td> '.$row[7].'  </td>
			<td> '.$row[8].'  </td>
		</tr>' ;}
echo '</table>'; 
}	

if($_POST['afficheur'] == 2)
{ 
	$requete='SELECT DISTINCT * FROM p1907992.MOBILIER;';
	$resultat= mysqli_query($connexion,$requete);
	if($resultat == false ) echo "resultat pas fonctionner";

echo'<h2 >Liste des mobiliers </ h2 >';

echo ' <table> 

	<tr> 
		<th> IDM </th> 
		<th> nom  </th>
		<th> Nbcases </th>
		<th> NomE </th>
		<th> Image  </th>
		<th> Deplaçable  </th>
	</tr> ';

$nb = mysqli_num_rows($resultat);
for ($i=0;$i<$nb;$i++) {	
	$row = mysqli_fetch_row($resultat);
	echo '
		<tr> 
			<td> '.$row[0].'  </td> 
			<td> '.$row[1].' </td>
			<td> '.$row[2].'  </td>
			<td> '.$row[3].' </td>
			<td> '.$row[4].'  </td>
			<td> '.$row[5].'  </td>

		</tr>' ;}
echo '</table>'; 
}	

if($_POST['afficheur'] == 3)
{
	$requete='SELECT DISTINCT * FROM p1907992.PIEGE;';
	$resultat= mysqli_query($connexion,$requete);
	if($resultat == false ) echo "resultat pas fonctionner";

echo'<h2 >Liste des pièges </ h2 >';

echo ' <table> 

	<tr> 
		<th> IDP </th> 
		<th> nomP  </th>
		<th> Categorie </th>
		<th> ZoneEffet </th>
		<th> nomE  </th>
		<th> detecter  </th>
		<th> esquiver </th>
		<th> desamorcer  </th>
	</tr> ';

$nb = mysqli_num_rows($resultat);
for ($i=0;$i<$nb;$i++) {	
	$row = mysqli_fetch_row($resultat);
	echo '
		<tr> 
			<td> '.$row[0].'  </td> 
			<td> '.$row[1].' </td>
			<td> '.$row[2].'  </td>
			<td> '.$row[3].' </td>
			<td> '.$row[4].'  </td>
			<td> '.$row[5].'  </td>
			<td> '.$row[6].'  </td>
			<td> '.$row[7].'  </td>
		</tr>' ;}
echo '</table>';
echo '</section>';  
}

include('static/footer.php');
?>
     
 </body>
