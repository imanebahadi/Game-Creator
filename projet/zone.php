<?php 


$server ="localhost"; 
$user ="p1907992";
$mdp ="litmus";
$bd ="p1907992"; 

function connectBD($server, $user, $mdp, $bd) {
	$connexion=mysqli_connect($server, $user, $mdp, $bd  );
	if(mysqli_connect_errno()) 
	{
		printf("Échecde  la  connexion: %s\n",mysqli_connect_error());
		exit();
	}
	return $connexion;
	}

$connexion = connectBD($server, $user, $mdp, $bd); 
$requete = "SELECT nomEnv FROM p1907992.ENVIRONNEMENT";
mysqli_query($connexion,"SET NAMES 'utf8'");
$resultat = mysqli_query($connexion,$requete);

?>


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
<section id="sectionZone">    
	<h2> Créer votre propre zone ! </h2>
   <form action="zone.php" method="post">
	<label> description </label> <br>
	<input type="texte" name="description"> <br> <br>	
	
	<label> dimensions </label> <br>
	<input type="number" name="dimensions" > <br> <br>
	
	<label> nombre minimal d'équipements </label> <br>
	<input type="number" name="equipmin" value=1> <br> <br>
	
	<label> nombre maximal d'équipements </label> <br>
	<input type="number" name="equipmax" value=3> <br> <br>
	
	<label> nombre minimal de pièges </label> <br>
	<input type="number" name="piegemin" > <br> <br>
	
	<label> nombre maximal de pièges </label> <br>
	<input type="number" name="piegemax" > <br> <br>
	
	<label> nombre minimal de mobilier </label> <br>
	<input type="number" name="mobmin" > <br> <br>
	
	<label> nombre maximal de mobilier </label> <br>
	<input type="number" name="mobmax" > <br> <br>
	
	<label> nombre minimal de créatures </label> <br>
	<input type="number" name="creamin" > <br> <br>
	
	<label> nombre maximal de créatures </label> <br>
	<input type="number" name="creamax"> <br> <br>
	
	<label> nombre minimal de PNJ </label> <br>
	<input type="number" name="pnjmin" value=1> <br> <br>
	
	<label> nombre maximal de PNJ </label> <br>
	<input type="number" name="pnjmax" value=3> <br> <br>
	
	 <select name="Liste">
	<option value="" selected >sélectionner environnement</option> <br> <br> <! liste déroulante !>
	
    <?php while ($row = mysqli_fetch_row($resultat)) {  // récupération des environnements de notre base
	echo '<option value="'.$row[0].'"> '.$row[0].' </option>';

	
} ?>
	</select>
    <input type="submit" name="envoi">
    <input type="reset" name="recharge" value="Reset" /> 
    </form>

<?php  

//connexion aux tables de notre base
$requete1 = "SELECT * FROM p1907992.CREATURE ORDER BY rand()";
$resultat1 = mysqli_query($connexion,$requete1);

$requete2 = "SELECT * FROM p1907992.PIEGE ORDER BY rand()";
$resultat2 = mysqli_query($connexion,$requete2);

$requete3 = "SELECT * FROM p1907992.EQUIPEMENT ORDER BY rand()";
$resultat3 = mysqli_query($connexion,$requete3);

$requete4 = "SELECT * FROM p1907992.MOBILIER ORDER BY rand()";
$resultat4 = mysqli_query($connexion,$requete4);

$requete5 = "SELECT * FROM p1907992.PNJ ORDER BY rand()";
$resultat5 = mysqli_query($connexion,$requete5);

 if(isset($_POST['envoi'])) { // si formulaire soumis

	if ($_POST['creamin'] <= $_POST['creamax'] && $_POST['piegemin'] <= $_POST['piegemax'] && $_POST['equipmin'] <= $_POST['equipmax'] && $_POST['mobmin'] <= $_POST['mobmax'] 
	&& $_POST['pnjmin'] <= $_POST['pnjmax']) { // vérification minimum < maximum 
	if ($_POST['creamax'] <= $_POST['dimensions'] && $_POST['piegemax'] <= $_POST['dimensions'] && $_POST['equipmax'] <= $_POST['dimensions'] && $_POST['mobmax'] <= $_POST['dimensions']
	&& $_POST['pnjmax'] <= $_POST['dimensions']) { // vérification valeurs saisies < dimensions
		
	// valeurs aléatoires entre min et max saisis
	$taille = rand($_POST['creamin'],$_POST['creamax']); 
	$taille2 = rand($_POST['piegemin'],$_POST['piegemax']);
	$taille3 = rand($_POST['equipmin'],$_POST['equipmax']);
	$taille4 = rand($_POST['mobmin'],$_POST['mobmax']);
	$taille5 = rand($_POST['pnjmin'],$_POST['pnjmax']);

for ($i=0;$i<$taille;$i++) {	// boucle de 0 à une valeur aléatoire entre min et max
$row = mysqli_fetch_row($resultat1); // récupère une ligne de résultat
	echo '
			<div class="wrapper">
			<div class="box1">Creature<p> <acronym title=
"'.$row[0].'  
'.$row[2].'  
'.$row[3].'  
'.$row[4].'  
'.$row[5].'  
'.$row[6].'  
'.$row[7].'  
'.$row[8].'" 
> '.$row[1].'</acronym> </p> </div>' ;}

for ($i=0;$i<$taille2;$i++) {		
	$row2 = mysqli_fetch_row($resultat2);
		echo '
			<div class="wrapper">
			<div class="box2">Piège<p> <acronym title=
"'.$row2[0].' 
'.$row2[2].'  
'.$row2[3].'  
'.$row2[4].'  
'.$row2[5].'  
'.$row2[6].'  
'.$row2[7].'"
> '.$row2[1].'</acronym> </p> </div>' ;}
			
for ($i=0;$i<$taille3;$i++) {	
$row3 = mysqli_fetch_row($resultat3);
	echo '
			<div class="wrapper">
			<div class="box3">Equipement<p> <acronym title=
"'.$row3[0].' 
'.$row3[1].'" 
>'.$row3[2].'</acronym> </p> </div>' ;}
			
for ($i=0;$i<$taille4;$i++) {	
$row4 = mysqli_fetch_row($resultat4);
	echo '
			<div class="wrapper">
			<div class="box4">Mobilier<p> <acronym title=
"'.$row4[0].' 
'.$row4[2].' 
'.$row4[3].'  
'.$row4[4].'  
'.$row4[5].'"
> '.$row4[1].'</acronym> </p> </div>' ;}
					
for ($i=0;$i<$taille5;$i++) {	
$row5 = mysqli_fetch_row($resultat5);
	echo '
			<div class="wrapper">
			<div class="box5">PNJ<p> <acronym title=
"'.$row5[1].' 
'.$row5[2].'  
'.$row5[3].'  
'.$row5[4].'  
'.$row5[5].'  
'.$row5[6].'  
'.$row5[7].'"
> '.$row5[0].'</acronym> </p> </div>' ;}
			


		
} else echo "Erreur: valeurs saisies > dimensions !";
} else echo "Erreur: minimum > maximum !";
}


echo'</section> ';
include('static/footer.php');
?>
	 
</body>

</html>	
