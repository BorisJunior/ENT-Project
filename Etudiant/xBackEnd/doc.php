<?php
session_start();

  if ($_SESSION['login']) {

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

} else {
 
  header("location: pagerror.php");
}
	$id = $_SESSION['login'];
	$cat = $_POST['cat'];
	$nom = $_POST['nom'];
	$name = $_POST['name'];
	$ec = $_POST['ec'];
	$daten = date("Y-m-d");



 $query1="INSERT INTO etudact (lib_actvite, lien, dateact, matricule, id_ec, categorie) VALUES('$nom', '$name', '$daten','$id','$ec','$cat')";
 
 pg_query($db_handle, $query1) or die("Cannot execute query: $query\n");


  header("location: ../xFrontEnd/pageprof.php");
?>

