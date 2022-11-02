<?php  
session_start();

if  (!empty($_POST['nom']&&$_POST['prenom']&&$_POST['nomE']&&$_POST['teleph']&&$_POST['email']&&$_POST['password'])) {

	$db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");


$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$nomE=$_POST['nomE'];
$id_parent=$_POST['id_parent'];
$teleph=$_POST['teleph'];
$email=$_POST['email'];
$password=$_POST['password'];

$query = "INSERT INTO parent (id_parent, nom, prenom, teleph_Parent, email_parent,password_Parent, act, value)
					VALUES('$id_parent','$nom','$prenom', '$teleph', '$email', '$password', 'FALSE','$nomE' )";

$result = pg_query($db_handle,$query);





if ($result) {
        header("location: loginparent.php");
    } else {
     echo "Les données POSTées n'ont pas pu être enregistrée avec succès.\n";

   }

}  else {
  echo "<div class='alert alert-danger' role='alert'><center>
      VEUILLEZ RENSEIGNER TOUS LES CHAMPS
     </center></div>";
  }

?>
