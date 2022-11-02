<?php
session_start();



  if ($_SESSION['login']) {

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

} else {
 
  header("location: pagerror.php");
}
	$ec1 = $_POST['ec1'];
	$ec2 = $_POST['ec2'];
	$ec3 = $_POST['ec3'];
	$ec4 = $_POST['ec4'];
	$classe = $_POST['classe'];
	$daten = $_POST['dateemp'];




 $query1="INSERT INTO emploidutemps(horaire_un, horaire_deux, horaire_trois, horaire_quatre, id_classe, dateemp) VALUES ('$ec1', '$ec2', '$ec3','$ec4','$classe','$daten')";
 
 pg_query($db_handle, $query1) or die("Cannot execute query: $query1\n");


  header("location: ../xFrontEnd/misemp.php");
?>

