<?php
session_start();


if ($_SESSION['login']) {
	$id=$_SESSION['login'];

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");


} else {
 
  header("location: pagerror.php");
}

	$doc = $_POST['doc'];


 $query="DELETE FROM biblio WHERE id_bibilo = '$doc'";

pg_query($db_handle, $query) or die("Cannot execute query: $query\n");

header("location: ../xFrontEnd/Biblio.php");
 


?>