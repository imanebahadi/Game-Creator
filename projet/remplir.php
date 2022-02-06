<!DOCTYPE html>
<html>
<head> <title> insertion de données </title> </head>
<body> 
	<h2> insertion de données. </h2>

<?php 
$server1 ="localhost"; 
$user1 ="p1907992";
$mdp1 ="litmus";
$bd1 ="dataset"; 


function connectBD($server, $user, $mdp, $bd) {
	$connexion=mysqli_connect($server, $user, $mdp, $bd  );
	if(mysqli_connect_errno()) 
	{
		printf("Échecde  la  connexion: %s\n",mysqli_connect_error());
		exit();
	}
	return $connexion;
	}

$connexion1 = connectBD($server1, $user1, $mdp1, $bd1);
mysqli_query($connexion1,"SET NAMES 'utf8'"); // encodage utf8 au moment de la connexion à dataset

$requete = "SELECT id,nom,attributs FROM dataset.DonneesFournies WHERE type = ? ";

$server ="localhost"; 
$user ="p1907992";
$mdp ="litmus";
$bd ="p1907992"; 
$connexion = connectBD($server, $user, $mdp, $bd); 
mysqli_query($connexion,"SET NAMES 'utf8'");

 $stmt=mysqli_prepare($connexion1, $requete); // préparation de la requête
	if(!($stmt))
		echo "Erreur de  préparation(".mysqli_errno($connexion1). ") :
		".mysqli_error($connexion1);
		else {
			$var = "creature";
			mysqli_stmt_bind_param($stmt, "s", $var); // liaison de $var à la requête $stmt 
			mysqli_stmt_execute($stmt);  // exécution de la requête 
			mysqli_stmt_bind_result($stmt,$var1,$var2,$var3);  // association des colonnes d'un résultat aux variables 
		
			while ( mysqli_stmt_fetch($stmt)) { //lecture des résultats de $stmt
			$r = str_replace(",","&",$var3);
			parse_str($r,$output); $a = $output['catégorie']; 
			parse_str($r,$output); $b = $output['climat']; 
			parse_str($r,$output); $c = $output['pieces']; 
			parse_str($r,$output); $d = $output['environnement']; 
			parse_str($r,$output); $e = $output['difficulté']; 
			parse_str($r,$output); $f = $output['attaque']; 
			parse_str($r,$output); $g = $output['vie']; 
			
		$mabase2 = "INSERT INTO p1907992.ENVIRONNEMENT(nomEnv) VALUES ('$d')"; // insertion des environnements dans notre base
		$insertion = mysqli_query($connexion, $mabase2);
				if($insertion == TRUE) {
					printf("<p> L'id a bien été ajoutée ! </p>");
					}
				else printf ("<p> Erreur lors de l'insertion.  </p>");
				
		$mabase = "INSERT INTO p1907992.CREATURE(idC,nomC,categorieP,climat,pieces,difficulte,attaque,vie,nomEnv) 
				VALUES ('$var1','$var2','$a','$b','$c','$e','$f','$g','$d')"; // insertion dans notre base 
		$insertion = mysqli_query($connexion, $mabase);
				if($insertion == TRUE) {
					printf("<p> L'id a bien été ajoutée ! </p>");
					}
				else printf ("<p> Erreur lors de l'insertion.  </p>");
				
				
		
			
	}
				
	
	$var = "mobilier"; // réutilisation de la requête préparée $stmt
	mysqli_stmt_execute($stmt); 
	mysqli_stmt_bind_result($stmt,$var4,$var5,$var6); 
	while ( mysqli_stmt_fetch($stmt)) {
		$exp = explode (',',$var6); // retourne un tableau
		parse_str($exp[0],$output);
		$a = $output['image'];
		parse_str($exp[1],$output);
		$b = $output['deplacable'];
		parse_str($exp[2],$output);
		$c = $output['dimensions'];
		$mabase = "INSERT INTO p1907992.MOBILIER(idM,nom,image,deplacable,nbcases) 
		 VALUES ('$var4','$var5','$a','$b','$c')" ;
		$insertion = mysqli_query($connexion, $mabase);
		if($insertion == TRUE) {
			printf("<p> L'id a bien été ajoutée ! </p>");
				}
		else printf ("<p> Erreur lors de l'insertion  </p>");
	} 
			
	$var = "piege"; // réutilisation de la requête préparée $stmt
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt,$var7,$var8,$var9); 
	while ( mysqli_stmt_fetch($stmt)) {
		$exp = explode (',',$var9);
		parse_str($exp[0],$output);
		$a = $output['catégorie']; 
		parse_str($exp[1],$output);
		$b = $output['detecter'];
		parse_str($exp[2],$output);
		$c = $output['esquiver']; 
		parse_str($exp[3],$output);
		$d = $output['desamorcer'];
		parse_str($exp[4],$output);
		$e = $output['zone']; 
		$mabase = "INSERT INTO p1907992.PIEGE(idP,nomP,categorie,detecter,esquiver,desamorcer,zoneEffet)
		 VALUES ('$var7','$var8','$a','$b','$c','$d','$e')";
		$insertion = mysqli_query($connexion, $mabase);
		if($insertion == TRUE) {
			printf("<p> L'id a bien été ajoutée ! </p>");
				}
		else printf ("<p> Erreur lors de l'insertion  </p>");
		
		
				
	}
}


?>
</body>
</html>
