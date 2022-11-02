<?php 
session_start();

if ($_SESSION['login']) {

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

} else {
 
  header("location: pagerror.php");
}


 	  $ident = $_SESSION['ident'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    


 $query="SELECT ec.id_ec, dispensercours.id_classe, ec.libelle_ec FROM professeur INNER JOIN dispensercours ON professeur.id_prof = dispensercours.id_prof  INNER JOIN ec ON ec.id_ec = dispensercours.id_ec WHERE professeur.id_prof IN (SELECT dispensercours.id_prof FROM dispensercours WHERE dispensercours.id_classe is NOT NULL ) AND professeur.id_prof='$ident' ORDER BY dispensercours.id_classe, nom_prof ASC ";

$result = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");



$query2="SELECT ec.id_ec, professeur.id_prof, dispensercours.id_classe, ec.libelle_ec FROM professeur INNER JOIN dispensercours ON professeur.id_prof = dispensercours.id_prof  INNER JOIN ec ON ec.id_ec = dispensercours.id_ec WHERE professeur.id_prof IN (SELECT dispensercours.id_prof FROM dispensercours WHERE dispensercours.id_classe is NOT NULL) AND  professeur.id_prof='$ident' ORDER BY dispensercours.id_classe, nom_prof ASC ";
$result2 = pg_query($db_handle, $query2) or die("Cannot execute query: $query\n");


$query3="SELECT professeur.id_prof, professeur.nom_prof, professeur.prenom_prof, dispensercours.id_classe, ec.libelle_ec FROM professeur INNER JOIN dispensercours ON professeur.id_prof = dispensercours.id_prof  INNER JOIN ec ON ec.id_ec = dispensercours.id_ec WHERE professeur.id_prof IN (SELECT dispensercours.id_prof FROM dispensercours WHERE dispensercours.id_classe is NOT NULL) AND  professeur.id_prof='$ident' ORDER BY dispensercours.id_classe, nom_prof ASC ";
$result3 = pg_query($db_handle, $query3) or die("Cannot execute query: $query\n");

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <head>
 <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/jpg" href="../../assets/img/adm.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Matieres
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link href="../../assets/demo/demo.css" rel="stylesheet" />



   
    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a class href="pageadmin.php" style="height:70px;" ><div style="background-color: white;">
            <img src="../images/logi.png">
          </div></a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="pageadmin.php">
              <i class="now-ui-icons design_app"></i>
              <p>Accueil</p>
            </a>
          </li>
          <li class="active ">
            <a href="Professeurs.php">
              <i class="now-ui-icons education_atom"></i>
              <p>Professeurs</p>
            </a>
          </li>
          <li>
            <a href="Etudiants.php">
              <i class="now-ui-icons education_hat"></i>
              <p>Etudiants</p>
            </a>
          </li>
          <li>
            <a href="Matieres.php">
              <i class="now-ui-icons education_paper"></i>
              <p>Matières</p>
            </a>
          </li>
          <li>
            <a href="Tuteurs.php">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Tuteurs</p>
            </a>
          </li>
          <li>
            <a href="Emploi.php">
              <i class="now-ui-icons files_paper"></i>
              <p>Emploi du Temps</p>
            </a>
          </li>
          <li>
            <a href="Note.php">
              <i class="now-ui-icons files_single-copy-04"></i>
              <p>Note d'informations</p>
            </a>
          </li>
          <li>
            <a href="Biblio.php">
              <i class="now-ui-icons education_agenda-bookmark"></i>
              <p>Bibliothèque</p>
            </a>
          </li>
          <li>
            <a href="">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>...</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="">Administateur</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
          
            <ul class="navbar-nav">
               <li class="nav-item dropdown">
              <li class="nav-item">
                <a class="nav-link" href="logout.php">
                  <i class="nc-user-run"></i>
                  <p>Deconnnexion
                    <span class="d-lg-none d-md-block">Deconnnexion</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- End Navbar -->
      <div style="height: 10px;" class="panel-header panel-header-lg">
      </div>
      <div class="content">
        <div class="row">
           <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title"> <?php echo 'Les matières enseignées par '.$nom.' '.$prenom.''; ?> </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                       Element Constitutif
                      </th>
                      <th>
                       Classe
                      </th>
                      <th>
                        Matière
                      </th>
                      
                    </thead>
                    <tbody>
                   


       <?php  
    while ($row = pg_fetch_row($result)) {
   echo' 
   <form method="POST" action="voirmatiere.php">

                                                <tr>
                                                <td><input type="text" name="" value="'.$row[0].'" disabled >
                                                   </td>

                                                <td><input type="text" name="" value="'.$row[1].'" disabled>
                                                     </td>

                                                <td>'.$row[2].'</td>
        
                                                </tr>

  </form>
  ';}?>
                                                



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>




        <div class="row">
          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Supprimer des matières </h4>
              </div>
             <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                       Element Constitutif
                      </th>
                      <th>
                       Classe
                      </th>
                      <th>
                        Matière
                      </th>
                      <th class="text-right">
                       
                      </th>
                    </thead>
                    <tbody>
                      <?php   while ($row2 = pg_fetch_row($result2)) {

   echo' 
    <form method="POST" action="../xBackEnd/pagesuppressmat.php">

                                                <tr>
                                                <td><input type="text" name="" value="'.$row2[0].'" disabled >
                                                <input type="hidden" name="mat" value="'.$row2[1].'"></td>

                                                <td><input type="text" name="" value="'.$row2[2].'" disabled></td>

                                                <td>
                                                <input type="hidden" name="classe" value="'.$row2[2].'">
                                                <input type="hidden" name="ec" value="'.$row2[0].'">'.$row2[3].'</td>

                                                <td class="text-right"> <button type="submit" class="btn btn-primary">Supprimer matière</button> </td>
        
                                                </tr>
 </form>
  ';}?>
                                                



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Ajouter des matières</h4>
              </div>
               <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                     <th>
                      Nom 
                      </th>
                      <th>
                       Prenom
                      </th>
                      <th>
                        Classe
                      </th>
                      <th>
                       Matiere
                      </th>
                      <th>
                      
                      </th>

                    </thead>
                    <tbody>

<form method="POST" action="pageajoutmat.php">

                      <?php   while ($row3 = pg_fetch_row($result3)) {
   echo' 
    
                                                <tr>
                                                <td><input type="text" name="" value="'.$row3[1].'" disabled >
                                                <input type="hidden" name="mat" value="'.$row3[0].'">
                                                <input type="hidden" name="profnom" value="'.$row3[1].'"></td>

                                                <td><input type="text" name="" value="'.$row3[2].'" disabled>
                                                <input type="hidden" name="profprenom" value="'.$row3[2].'" ></td>

                                                <td><input type="text" name="" value="'.$row3[3].'" disabled>
                                                <input type="hidden" name="" value="'.$row3[3].'"></td>
                                               
                                                <td class="text-right">'.$row3[4].'</td>

                                                
  ';}?>
                                                <td class="text-right"> <select name="classe">
                                                                         
                                                                        <option>L1A</option>
                                                                        <option>L1B</option>
                                                                        <option>L1C</option>
                                                                        <option>L2A</option>
                                                                        <option>L2B</option>
                                                                        <option>GLSI3</option>
                                                                        <option>ASR3</option>
                                                                        <option>MTWI3</option>
                                                                        </select> </td>

                                                <td class="text-right"> <button type="submit" class="btn btn-primary">Ajouter matière</button> </td>
        
                                                </tr>



 </form>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



      </div>
    </div>


    
      
     
         
    </div>
  </div>
   <!--   Core JS Files   -->
  <script src="../../assets/js/core/jquery.min.js"></script>
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
  <script src="../../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>

   
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>
</body>

</html>
