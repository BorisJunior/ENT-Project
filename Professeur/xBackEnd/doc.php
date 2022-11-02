<?php
session_start();

  if ($_SESSION['login']) {

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

} else {
 
  header("location: pagerror.php");
}
	$cat = $_POST['cat'];
	$nom = $_POST['nom'];
	$name = $_POST['name'];
	$classe = $_POST['classe'];
	$ec = $_POST['ec'];
	$daten = date("Y-m-d");



 $query1="INSERT INTO activite (lib_actvite, lien, etat_activite, datedebut, datefin, typeactivite, id_classe, id_ec) VALUES ('$nom', '$name', NULL, '$daten', NULL, '$cat', '$classe', '$ec')";
 
 pg_query($db_handle, $query1) or die("Cannot execute query: $query\n");


  header("location: ../xFrontEnd/pageprof.php");
?>

