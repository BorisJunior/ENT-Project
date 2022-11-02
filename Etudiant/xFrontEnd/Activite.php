<?php
session_start();
if ($_SESSION['login']) {
  $id = $_SESSION['login'];

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

} else {
 
  header("location: pagerror.php");
}

$var1='Cours';

$var2='Exercice';

$var3='Projet';

$var4='Travaux Pratiques';

$var1='Devoir';


 



 $query = "SELECT lib_actvite, lien, datedebut, typeactivite, activite.id_classe, libelle_ec
 FROM activite
 INNER JOIN ec ON ec.id_ec = activite.id_ec
 WHERE activite.id_classe IN (SELECT id_classe FROM etudiant WHERE matricule = '$id')";
 $result1 = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");



?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/jpg" href="../../assets/img/fav.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Activité
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />

   <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/fontawesome-all.css" rel="stylesheet">
    <link href="../css/swiper.css" rel="stylesheet">
  <link href="../css/magnific-popup.css" rel="stylesheet">
  <link href="../css/styles.css" rel="stylesheet">

   
<body data-spy="scroll" data-target=".fixed-top">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
      <br>
      <br>
      <br>
      <br>
      <br>
      </div>
            <div class="sidebar-wrapper">
              <ul class="nav">
          <li >
            <a href="Accueil.php">
              <i class="nc-icon nc-briefcase-24"></i>
              <p>Accueil</p>
            </a>
          </li>
          <li>
            <a href="Emploi.php">
              <i class="nc-icon nc-calendar-60"></i>
              <p>Emploi du temps</p>
            </a>
            </li>
            <li class="active">
            <a href="Activite.php">
              <i class="nc-icon nc-laptop"></i>
              <p>Espace Documents</p>
            </a>
          </li>
            <li>
            <a href="NoteDevoir.php">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Notes de Devoir</p>
            </a>
          </li>
          <li>
            <a href="NotePartiel.php">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Notes de Partiel</p>
            </a>
          </li>
          <li>
            <a href="NoteI.php">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Notes d'information</p>
            </a>
          </li>
          <li>
            <a href="profil.php">
              <i class="nc-icon nc-badge"></i>
              <p>Profil</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
     
     
    
    <!-- Preloader -->
  <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
  </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" >
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

        <!-- Image Logo -->
        <a class href="Accueil.php" style="height:70px;" ><div>
            <img src="../images/logi.png">
          </div></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
           <ul class="navbar-nav ml-auto">
                 
                <li class="nav-item" >
                    <a class="nav-link page-scroll" href="NoteDevoir.php" style="color: #287399;">Devoirs<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link page-scroll" href="NotePartiel.php" style="color: #287399;">Partiels<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link page-scroll" href="Accueil.php" style="color: #287399;">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="logout.php" style="color: #fca103;">Déconnexion</a>
                </li>

            </ul>
            <span class="nav-item social-icons">
                <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="https://www.facebook.com/ReseauDesAnciensEtudiantsDeLiaiTogo/" target="blank">
                        <i class="fas fa-circle fa-stack-2x facebook"></i>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="https://twitter.com/home" target="blank">
                        <i class="fas fa-circle fa-stack-2x twitter"></i>
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </a>
                </span>
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->

      <div class="content">
        

        <div class="row">
          <div class="col-md-1"></div>



          <div class="col-md-5">
            <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Accédez à vos cours</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">

                <div class="row"> 
                  <form action="act.php" method="POST">
                    <div class="col-md-12">
                      <input hidden="" name="var" value="Cours">
                      <div class="form-group" style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Consulter Cours</button>
                      </div>
                    </div>
                  </form>
                </div>
                        </div>
                      
                    </div>
                </div>
            
          </div>


          <div class="col-md-5">
            <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Accédez aux Exercices</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">

                 <div class="row">
                  <form action="act.php" method="POST">
                    <div class="col-md-12">
                      <input hidden="" name="var" value="Exercice">
                      <div class="form-group" style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Consulter Exercices</button>
                      </div>
                    </div>
                  </form>
                  </div>
                        </div>
                      
                    </div>
                </div>
            
          </div>

          </div>



          <div class="row">
          <div class="col-md-1"></div>



          <div class="col-md-5">
            <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Accédez à vos Projets</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">

                 <div class="row">
                  <form action="act.php" method="POST">
                    <div class="col-md-12">
                      <input hidden="" name="var" value="Projet">
                      <div class="form-group" style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Consulter Projets</button>
                      </div>
                    </div>
                    </form>
                  </div>
                        </div>
                      
                    </div>
                </div>
            
          </div>


          <div class="col-md-5">
            <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Accédez aux Travaux Pratiques</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">

                 <div class="row">
                  <form action="act.php" method="POST">
                    <div class="col-md-12">
                      <input hidden="" name="var" value="Travaux Pratiques">
                      <div class="form-group" style="text-align: center;">
                       <button type="submit" class="btn btn-primary">Consulter Travaux Pratiques</button>
                      </div>
                    </div>
                    </form>
                  </div>
                        </div>
                      
                    </div>
                </div>
            
          </div>

          </div>



          <div class="row">
          <div class="col-md-1"></div>



          <div class="col-md-5">
            <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Accédez à vos Devois</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">

                 <div class="row">
                  <form action="act.php" method="POST">
                    <div class="col-md-12">
                      <input hidden="" name="var" value="Devoir">
                      <div class="form-group" style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Consulter Devoir</button>
                      </div>
                    </div>
                    </form>
                  </div>
                        </div>
                      
                    </div>
                </div>
            
          </div>


          <div class="col-md-5">
            <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Accédez à la bibliothèque en ligne</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">

                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group" style="text-align: center;">
                        <a href="biblio.php" ><button class="btn btn-primary">Consulter Bibliothèque en ligne</button></a>
                      </div>
                    </div>
                  </div>
                        </div>
                      
                    </div>
                </div>
            
          </div>

          </div>

      </div>

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




function upload(){
 
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
  <script src="../../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
  <script src="../../assets/demo/demo.js"></script>
   </script><script src="../js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="../js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="../js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="../js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="../js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="../js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="../js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="../js/scripts.js"></script> <!-- Custom scripts -->
  
</body>

</html>

