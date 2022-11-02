<?php  
session_start();

if (!empty($_POST['nom']&&$_POST['prenom']&&$_POST['date']&&$_POST['lieu']&&$_POST['sexe']&&$_POST['email']&&$_POST['password'])) {

	$db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");


$mat=$_POST['matricule'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$date=$_POST['date'];
$lieu=$_POST['lieu'];
$sexe=$_POST['sexe'];
$email=$_POST['email'];
$password=$_POST['password'];

$query = "INSERT INTO etudiant (matricule, nom_etud, prenom_etud, date_naiss, lieu_naiss, sexe, email_etud, password_etud, photoetud, activeretud, id_classe, annee_sco, id_parent)
	VALUES('$mat','$nom','$prenom', '$date', '$lieu', '$sexe', '$email', '$password', NULL, 'FALSE', NULL, NULL, NULL)";

$result = pg_query($db_handle,$query);

if ($result) {
        header("location: loginetud.php");
    } else {
     echo "Les données POSTées n'ont pas pu être enregistrée avec succès.\n";

   }

}  else {
  echo "<div class='alert alert-danger' role='alert'><center>
      VEUILLEZ RENSEIGNER TOUS LES CHAMPS
     </center></div>";
  }

?>