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
$requete = "SELECT nomEnv FROM p1907992.ENVIRONNEMENT ORDER BY rand()";
mysqli_query($connexion,"SET NAMES 'utf8'");
$resultat = mysqli_query($connexion,$requete);

?>


<!DOCTYPE html>
<html>
<head>  <meta charset="utf-8" /> 
<link href="css/style.css" rel="stylesheet" media="all" type="text/css">
<?php include('static/header.php'); ?>
 <?php include('statistiques.php'); ?>
 <div id="menu"> 
 <?php include('static/menu.php'); ?>
 </div>

</head>
	
<body>
	 <section id="sectionCarte">
	<h2> Créer votre propre carte ! </h2>

	<input type="text" name="nom"> <br> <br>	
	
	<label> description </label> <br>
	<input type="text" name="description" > <br> <br>
	
	<label> créatrice </label> <br>
	<input type="text" name="créatrice" > <br> <br>
	
	<label> nombre minimal de zones </label> <br>
	<input type="number" name="zonemin" > <br> <br>
	
	<label> nombre maximal de zones </label> <br>
	<input type="number" name="zonemax" > <br> <br>
	
	<select name="Liste" multiple="oui">
	<option value="" selected >sélectionner environnement</option> <br> <br> 
	
    <?php while ($row = mysqli_fetch_row($resultat)) {
	echo '<option value="'.$row[0].'"> '.$row[0].' </option>'; }?>  </select> <br> <br> 
	
	<label> nombre minimal d'équipement </label> <br>
	<input type="number" name="equipmin" > <br> <br>
	
	<label> nombre maximal d'équipement </label> <br>
	<input type="number" name="equipmax" > <br> <br>
	
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
	<input type="number" name="creamax" > <br> <br>
	
	<label> nombre minimal de PNJ </label> <br>
	<input type="number" name="pnjmin" value=1> <br> <br>
	
	<label> nombre maximal de PNJ </label> <br>
	<input type="number" name="pnjmax" value=3> <br> <br>
	
	<select name="Liste">
	<option value="" selected >sélectionner objectif</option> <br> <br>
	<option value=1 >équipement</option> <br> <br>
	<option value=1 selected >zone</option> <br> <br> </select> <br> <br> 
	
	<label> nombre moyen de zones réliées </label> <br>
	<input type="number" name="zonemoy" value=3> <br> <br>
	
	<label> nombre de passages secrets</label> <br>
	<input type="number" name="secret" value=3> <br> <br>
	
    <input type="submit" name="envoi">
    <input type="reset" name="recharge" value="Reset" />
    </form>
    

<?php echo '</section>';
include('static/footer.php'); ?>

</body>
</html>
