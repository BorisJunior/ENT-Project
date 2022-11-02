<?php
session_start();

if ($_SESSION['login']) {
  $id=$_SESSION['login'];

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

} else {
 
  header("location: pagerror.php");
}



 $query="SELECT categorie, nom, id_biblio FROM biblio ORDER BY categorie ASC ";
 $result = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");





  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/jpg" href="../../assets/img/adm.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Accueil
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link href="../../assets/demo/demo.css" rel="stylesheet" />


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
</head>

<body class="animsition">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a class href="pageadmin.php" style="height:70px;" ><div style="background-color: white; ">
            <img src="../images/logi.png">
          </div></a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="pageadmin.php">
              <i class="now-ui-icons design_app"></i>
              <p>Accueil</p>
            </a>
          </li>
          <li>
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
          <li class="active">
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
                <a class="nav-link" href="#Stats">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#profil">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="logout.php">
                  <i class=""></i>
                  <p>Deconnnexion
                    <span class="d-lg-none d-md-block"></span>
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
      
    
          <div id="profil" class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Bibliothèques</h5>
              </div>
              <div class="card-body">
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
                        <select id="cat" style="width: 200px; height: 50px;">
                         <option>Programmation Web</option>
                         <option>Programmation Mobile</option> 
                         <option>Programmation Orientée Objet</option>
                         <option>Algorithmes et Principes de conception</option>
                         <option>Architecture des ordinateurs</option> 
                         <option>Langages de programmation</option>
                         <option>Anglais</option>
                         <option>Autres</option>
                         </select>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <br>
                        <label for="file-upload" class="custom-file-upload" style="border: 3px solid #ccc;display: inline-block;padding: 6px 12px;cursor: pointer; width: 200px; height: 50px; color: rgb(0, 0, 0);">
                        <i class="fa fa-cloud-upload"></i>Choisir Document
                        </label>
                        <input id="file-upload" name='upload_cont_img' type="file">
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



                  <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Bibliothèques</h5>
              </div>
                    <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Categorie
                      </th>
                      <th>
                       Nom
                      </th>
                      <th class="text-right">
                        
                      </th>
                    </thead>
                    <tbody>
                      <?php  
                       while ($row = pg_fetch_row($result)) {
   echo' 
   <form method="POST" action="supdoc.php">

                                                <tr>
                                                <td><input type="text" name="" value="'.$row[0].'" disabled >
                                                    <input type="hidden" name="doc" value="'.$row[2].'"></td>

                                                <td>'.$row[1].'</td>

                                                <td class="text-right"> <button type="submit"class="btn btn-primary">Supprimer Document</button> </td>
        
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


      
    <!-- end of footer -->
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-storage.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-analytics.js"></script>

  <script>

$('#file-upload').change(function() {
  var i = $(this).prev('label').clone();
  var file = $('#file-upload')[0].files[0].name;
  $(this).prev('label').text(file);
});
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



window.open("BiblioLoad.php?cat="+cat+"&nom="+nom+"&name="+name);

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
  <script src="../../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
  <script src="../../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  
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
    <script src="../js/main.js"></script>

    
</body>

</html>