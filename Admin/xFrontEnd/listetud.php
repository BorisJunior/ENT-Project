<?php
session_start();

if ($_SESSION['login']) {

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

} else {
 
  header("location: pagerror.php");
}


$classe=$_SESSION['classe'];
  
  $query="SELECT matricule, nom_etud, prenom_etud FROM etudiant  WHERE id_classe='$classe'";
  $result = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");


  $query1="SELECT matricule, nom_etud, prenom_etud FROM etudiant  WHERE id_classe='$classe'";
  $result1 = pg_query($db_handle, $query1) or die("Cannot execute query: $query\n");

  

  $query2="SELECT annee_sco FROM anneescolaire";
 $result2 = pg_query($db_handle, $query2) or die("Cannot execute query: $query\n");
 
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
    Etudiants
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
          <li >
            <a href="Professeurs.php">
              <i class="now-ui-icons education_atom"></i>
              <p>Professeurs</p>
            </a>
          </li>
          <li class="active ">
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
            <a class="navbar-brand" href="">Administrateur</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
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
                <h4 class="card-title">Liste des étudiants en <?php echo $classe; ?> </h4>
 
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <th>
                        Matricule
                      </th>
                      <th>
                        Nom
                      </th>
                      <th>
                        Prenoms
                      </th>
                      <th class="text-right">
                        
                      </th>
                      
                    </thead>
                    <tbody>
                      <?php  
                   while ($row = pg_fetch_row($result1)) {
   echo' 
   <form method="POST" action="../xBaxkEnd/pageaffecetud.php">

                                                <tr>
                                                <td><input type="text" name="" value="'.$row[0].'" disabled >
                                                    <input type="hidden" name="matetud" value="'.$row[0].'"></td>

                                                <td><input type="text" name="" value="'.$row[1].'" disabled>
                                                    <input type="hidden" name="etudnom" value="'.$row[1].'"> </td>

                                                <td><input type="text" name="" value="'.$row[2].'" disabled>
                                                    <input type="hidden" name="etudprenom" value="'.$row[2].'" disabled> </td>

                                               
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
                <h4 class="card-title">Modifier la salle</h4>
 
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <th>
                        Matricule
                      </th>
                      <th>
                        Nom
                      </th>
                      <th>
                        Prenoms
                      </th>
                      <th>
                        Année Scolaire
                      </th>
                      <th>
                        Nouvellle Salle
                      </th>
                      <th>
                        
                      </th>
                      
                    </thead>
                    <tbody>


                      <?php   
                      
                       while ($row2 = pg_fetch_row($result)) {
   echo' 
   <form method="POST" action="../xBackEnd/pageaffecetud.php">

                                                <tr>
                                                <td><input type="text" name="" value="'.$row2[0].'" disabled >
                                                    <input type="hidden" name="matetud" value="'.$row2[0].'"></td>

                                                <td><input type="text" name="" value="'.$row2[1].'" disabled>
                                                    <input type="hidden" name="etudnom" value="'.$row[1].'"> </td>

                                                <td><input type="text" name="" value="'.$row2[2].'" disabled>
                                                    <input type="hidden" name="etudprenom" value="'.$row2[2].'" disabled> </td>

                                                
                                                 <td> <select name="annee_sco">
                                                                       
                    					  <option>2020-21</option>
                                          <option>2021-22</option>
                                          <option>2022-23</option>
                                          <option>2023-24</option>
                                          <option>2024-25</option>
                                          <option>2025-26</option>
                                          <option>2026-27</option>';
                  

                                                                        echo '</select> </td>


                                                 
                                                <td class="text-right"> <select name="classe">
                                                                        <option>Choisir Classe</option> 
                                                                        <option>L1A</option>
                                                                        <option>L1B</option>
                                                                        <option>L1C</option>
                                                                        <option>L2A</option>
                                                                        <option>L2B</option>
                                                                        <option>GLSI3</option>
                                                                        <option>ASR3</option>
                                                                        <option>MTWI3</option>
                                                                        </select> </td>

                                               <td class="text-right"> <button type="submit" class="btn btn-primary">Modifier la salle</button> </td>
        

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
        
    

      </div>
    </div>

    </div>
  </div> <!--   Core JS Files   -->
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