<?php
session_start();

if ($_SESSION['login']) {
  $id = $_SESSION['login'];

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

} else {
 
  header("location: pagerror.php");
}



$matiere=$_SESSION['matiere'];
$matierelib=$_SESSION['matierelib'];
$classe=$_SESSION['classe'];
$an=$_SESSION['an'];


$query="SELECT etudiant.matricule, nom_etud, prenom_etud FROM etudiant WHERE id_classe='$classe' AND matricule NOT IN (SELECT matricule FROM notes  WHERE id_ec='$matiere')";
$result = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");






$query1="SELECT etudiant.matricule, nom_etud, prenom_etud, devoir, partiel FROM etudiant INNER JOIN notes ON etudiant.matricule = notes.matricule  WHERE id_classe='$classe'
                                                                                          AND   id_ec='$matiere'";

$result1 = pg_query($db_handle, $query1) or die("Cannot execute query: $query\n");






 $query2="SELECT COUNT(*) FROM etudiant WHERE id_classe='$classe' AND matricule NOT IN (SELECT  matricule FROM notes  WHERE id_ec='$matiere') ";
 
$result2 = pg_query($db_handle, $query2) or die("Cannot execute query: $query\n");





 $query3="SELECT COUNT(*) FROM etudiant INNER JOIN notes ON etudiant.matricule = notes.matricule  WHERE id_classe='$classe'
                                                                                          AND   id_ec='$matiere'";
$result3 = pg_query($db_handle, $query3) or die("Cannot execute query: $query\n");


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="../../assets/img/fovio.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Page Prof</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../https://use.fontawesome.com/releases/v5.12.0/css/all.css">


    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/stylas.css" rel="stylesheet">


</head>

<body id="page-top" class="animsition">
     <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

            <div class="container-fluid">

  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top" >
    <div class="container">

      <div class="logo float-left"  >
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="pageprof.php" class="scrollto"><img src="../img/logi.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#about">Noter</a></li>
          <li><a href="#why-us">Stats</a></li>
          <li><a href="logout.php">Deconnexion</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="../img/about-extra-2.svg" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2>Pocéder à l'affectations des<br><span> notes</span> aux étudiants<br> 
      </h2></div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>IAI-Online</h3>
          <p>IAI-Online vous offre la possibilité de procéder à la notation des étudiants ayant composés dans la/les matière(s) vous enseignez en ligne</p>
        </header>
            <div id="about" class="container-fluid">
                <h3 class="text-dark mb-4">Noter les étudiants ici </h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Etudiants à noter</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Nom de l'Etudiant</th>
                                        <th>Prenom de l'Etudiant</th>
                                        <th>Note de Devoir</th>
                                        <th>Note de Partiel</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php  
  while ($row = pg_fetch_row($result)) {
   echo' 
   <form method="POST" action="../xBackEnd/affectnote.php">
                                    <tr>
                                        <td>'.$row[1].'
                                        <input type="hidden" name="matricule" value="'.$row[0].'" >
                                        <input type="hidden" name="matiere" value="'.$matiere.'" >
                                        <input type="hidden" name="matierelib" value="'.$matierelib.'" >
                                        <input type="hidden" name="matierelib" value="'.$id.'" >
                                        <input type="hidden" name="classe" value="'.$classe.'" >
                                        <input type="hidden" name="an" value="'.$an.'" ></td>

                                        <td>'.$row[2].'</td>

                                        <td><input type="number" min="0" max="20" name="devoir" value="" ></td>

                                        <td><input type="number" min="0" max="20" name="partiel" value="" ></td>

                                        <td><button type="submit" class="btn btn-primary">Noter</button></td>
                                    </tr>
  </form>'; } ?> 

                                </tbody>
                            </table>
                        </div>
                      
                    </div>
                    <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Etudiants déjà notés</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Nom de l'Etudiant</th>
                                        <th>Prenom de l'Etudiant</th>
                                        <th class="text-right">Note de Devoir</th>
                                        <th class="text-right">Note de Partiel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php  
  while ($row1 = pg_fetch_row($result1)) {
   echo' 
   
                                    <tr>
                                        <td>'.$row1[1].'
                                        <input type="hidden" name="matricule" value="'.$row1[0].'" ></td>

                                        <td>'.$row1[2].'</td>

                                        <td><input type="number" name="" value="'.$row1[3].'" disabled></td>

                                        <td><input type="number" name="" value="'.$row1[4].'" disabled></td>

                                        
                                    </tr>
  '; } ?> 

                                </tbody>
                            </table>
                        </div>
                      </div>
                    </div>

                  </div>
                
            </div>
            <!--==========================
      Why Us Section
    ============================-->
     <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Statistiques</h3>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-object-group"></i>
              <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Le courage ne rugit pas toujours. Parfois, le courage se démontre en disant avec une voix calme à la fin de la journée : "Je vais essayer encore demain. <br>~Mary Anne Radmacher </p>
                
              </div>
            </div>
          </div>

        </div>

        <div class="row counters">

          <div class="col-lg-6 col-6 text-center">
            <span data-toggle="counter-up"><?php 
                                              while ($row2 = pg_fetch_row($result2)) { echo $row2[0];} ?></span>
            <p><?php echo 'Nombre détudiants à noter en '.$matierelib; ?></p>
          </div>

          <div class="col-lg-6 col-6 text-center">
            <span data-toggle="counter-up"><?php 
                                              while ($row3 = pg_fetch_row($result3)) { echo $row3[0];} ?></span>
            <p><?php echo 'Nombre détudiants déjà noté en '.$matierelib; ?></p>
          </div>

        </div>

        
      </div>
    </section>
        </div>
  
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../assets/js/theme.js"></script>
     <script src="../vendor/animsition/animsition.min.js"></script>
     <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
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
    <script src="../js/mainn.js"></script>

  <!-- JavaScript Libraries -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/easing/easing.min.js"></script>
  <script src="../lib/mobile-nav/mobile-nav.js"></script>
  <script src="../lib/wow/wow.min.js"></script>
  <script src="../lib/waypoints/waypoints.min.js"></script>
  <script src="../lib/counterup/counterup.min.js"></script>
  <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../lib/isotope/isotope.pkgd.min.js"></script>
  <script src="../lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>


</body>

</html>
