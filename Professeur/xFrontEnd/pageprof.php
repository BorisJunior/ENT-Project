<?php
session_start();


if ($_SESSION['login']) {
  $id = $_SESSION['login'];

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

} else {
 
  header("location: pagerror.php");
}

 $query="SELECT nom_prof, prenom_prof FROM professeur WHERE id_prof='$id'";

 $result = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");



 

$query1="SELECT ec.id_ec, ec.libelle_ec, dispensercours.id_classe, dispensercours.id_prof, ec.statut FROM ec INNER JOIN dispensercours ON ec.id_ec = dispensercours.id_ec WHERE dispensercours.id_prof=(SELECT id_prof FROM professeur WHERE id_prof = '$id') ";

$result1 = pg_query($db_handle, $query1) or die("Cannot execute query: $query\n");

$result11 = pg_query($db_handle, $query1) or die("Cannot execute query: $query\n");




$query2="SELECT COUNT(*) FROM etudiant INNER JOIN ec ON etudiant.id_classe = ec.id_classe INNER JOIN dispensercours ON ec.id_ec = dispensercours.id_ec WHERE
  id_prof ='$id' ";

$result2 = pg_query($db_handle, $query2) or die("Cannot execute query: $query\n");




$query3="SELECT COUNT(*) FROM ec INNER JOIN dispensercours ON ec.id_ec = dispensercours.id_ec WHERE
  id_prof='$id'";
$result3 = pg_query($db_handle, $query3) or die("Cannot execute query: $query\n");
  

$query4="SELECT annee_sco FROM anneescolaire";
$result4 = pg_query($db_handle, $query4) or die("Cannot execute query: $query\n");
$result44 = pg_query($db_handle, $query4) or die("Cannot execute query: $query\n");


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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">


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
          <li><a href="#info">Charger document</a></li>
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
        <img src="../img/intro-img.svg" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2>Bienvenue<br><span><?php
                                                while ($row = pg_fetch_row($result)) { echo ''.$row[0].' '.$row[1];} ?></span><br>sur votre page offcielle 
      </div>

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
 
        <div id="about" class="row about-container">

                <div class="row about-extra">
          <div class="col-lg-4 wow fadeInUp">
            <img src="../img/about-img.svg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 wow fadeInUp pt-5 pt-lg-0">
            <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Voici les matières que vous dispensez. Dans laquelle voulez-vous noter les étudiants</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Classe</th>
                                        <th>Matière enseignée</th>
                                        <th>Année Scolaire</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php  
   while ($row1 = pg_fetch_row($result1)) {
   echo' 
   <form method="POST" action="inter.php">
                                    <tr>
                                        <td>'.$row1[2].'
                                        <input type="hidden" name="classe" value="'.$row1[2].'" ></td>

                                        <td>'.$row1[1].'
                                        <input type="hidden" name="matiere" value="'.$row1[0].'">
                                        <input type="hidden" name="matierelib" value="'.$row1[1].'">
                                        <input type="hidden" name="idprof" value="'.$row1[3].'"></td>';

                                        if ($row1[4] == 'Actif') {
                                          echo'<td> <select name="annee_sco">
                                          <option>2020-21</option>
                                          <option>2021-22</option>
                                          <option>2022-23</option>
                                          <option>2023-24</option>
                                          <option>2024-25</option>
                                          <option>2025-26</option>
                                          <option>2026-27</option>';
                                                                       
                  

                                                                        echo '</select> </td>

                                        <td><button type="submit"  formtarget="_blank"  class="btn btn-primary">
                                            Noter les étudiants de cette salle</button></td>
                                    </tr>
                                    </form>';
                                         
                                        } else {
                                           echo '<td> <select name="annee_sco">
                                                                        <option>Choisir Année Scolaire</option>';
                                                                       
                     echo '</select> </td>

                                         
                                        <td><button type="submit"  disabled="" class="btn btn-primary">
                                            Notation Vérouillée</button></td>
                                        </tr>
                                        </form>';
                                         


                                        }



} 

?> 

                                </tbody>
                            </table>
                        </div>
                      
                    </div>
                </div>
            
          </div>
        </div>

          
        </div>






        <div id="info" class="row about-container">

                <div class="row about-extra">
          
          <div class="col-lg-9 wow fadeInUp pt-5 pt-lg-0">
            <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Mettre en ligne un document</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <form method="POST">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nom du document</label>
                        <input type="text" class="form-control" id="nom" placeholder="Nom du document">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Catégorie</label>
                        <br>
                        <select id="cat" style="width: 150px; height: 40px;">
                         <option>Cours</option>
                         <option>Exercice</option>
                         <option>Travaux Pratiques</option>
                         <option>Devoir</option>
                         <option>Projet</option> 
                         </select>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <br>
                        <input id="file-upload" type="file" >
                      </div>
                    </div>

                  </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group" style="text-align: center;">
                        <button class="btn btn-primary" onclick="uploadImage()">Charger document</button>
                      </div>
                    </div>
                  </div>
                        </div>
                      
                    </div>
                </div>
            
          </div>
          <div class="col-lg-3 wow fadeInUp">
            <img src="../img/details-2.png" class="img-fluid" alt="">
          </div>
        </div>

        
          
        </div>







        <div id="about" class="row about-container">

                <div class="row about-extra">
          <div class="col-lg-4 wow fadeInUp">
            <img src="../img/details-1.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 wow fadeInUp pt-5 pt-lg-0">
            <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Envoyez des notes d'informations à vos étudiants</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                           <?php  
   while ($row11 = pg_fetch_row($result11)) {?>
   
                            <form method="POST" action="../xBackEnd/noteip.php">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Classe</label>
                        <input type="text" disabled="" class="form-control" <?php echo'value="'.$row11[2].'"';?>>
                        <input type="text" hidden="" name="classe" class="form-control" <?php echo'value="'.$row11[2].'"';?>>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Matière</label>
                        <input type="text" disabled="" class="form-control"<?php echo'value="'.$row11[1].'"';?>>
                        <input type="text" hidden="" name="ec" class="form-control"<?php echo'value="'.$row11[0].'"';?>>
                      </div>
                    </div>

                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Intitulé</label>
                        <input type="text" class="form-control" name="objet" placeholder="Objet de la note">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Contenu</label>
                        <textarea class="form-control textarea" name="contenu" ></textarea>
                      </div>
                    </div>
                  </div>

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group" style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                      </div>
                    </div>
                  </div>
                </form> <?php
                } 

?>
                        </div>
                      
                    </div>
                </div>
            
          </div>
        </div>

          
        </div>


      </div>
    </section><!-- #about -->

   

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
                <h5 class="card-title"> </h5>
                <p class="card-text">Si les décisions que vous prenez pour investir vos efforts acharnés ne sont pas cohérentes avec la personne que vous souhaitez devenir, vous ne deviendrez jamais cette personne. <br>~Clayton M. </p>
                
              </div>
            </div>
          </div>

        </div>

        <div class="row counters">

          <div class="col-lg-6 col-6 text-center">
            <span data-toggle="counter-up"><?php 
                                               while ($row3 = pg_fetch_row($result3)) { echo $row3[0];} ?></span>
            <p>Nombre de matières dispensées</p>
          </div>

          <div class="col-lg-6 col-6 text-center">
            <span data-toggle="counter-up"><?php 
                                               while ($row2 = pg_fetch_row($result2)) { echo $row2[0];} ?></span>
            <p>Nombre d'étudiants </p>
          </div>

        </div>

        
      </div>
    </section>
            </div>
        </div>
   
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-storage.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-analytics.js"></script>

      <script>

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyALT0n375mW0_d8H_pdtDZ1zpY4ewNoamE",
    authDomain: "entproject-31fe8.firebaseapp.com",
    projectId: "entproject-31fe8",
    storageBucket: "entproject-31fe8.appspot.com",
    messagingSenderId: "1084421825929",
    appId: "1:1084421825929:web:fa4f2c73af320e04b4ed58",
    measurementId: "G-HE9MNPJGXM"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();

  console.log(firebase);




function uploadImage(){
 
      const cat = document.getElementById('cat').value;
      const nom = document.getElementById('nom').value;

      const ref = firebase.storage().ref();
      const file = document.querySelector("#file-upload").files[0];
      const name = +new Date() + "-" + file.name;
      const metadata = {
        contentType: file.type
      };
      const task = ref.child(name).put(file, metadata);
      
      task.then(snapshot => snapshot.ref.getDownloadURL()).then(function(url) {
          console.log(url);
          document.querySelector("#file-upload").src = url;
        }).catch(console.error);



window.open("upload.php?cat="+cat+"&nom="+nom+"&name="+name);

}

</script>
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

