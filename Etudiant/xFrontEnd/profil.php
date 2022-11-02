<?php
session_start();

if ($_SESSION['login']) {

  $id = $_SESSION['login'];
  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

} else {
 
  header("location: pagerror.php");
}



 $query="SELECT nom_etud, prenom_etud, sexe, email_etud, date_naiss, lieu_naiss 
         FROM etudiant WHERE matricule='$id'";
 $result = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");


 $result11 = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");


 $result12 = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");


 $result13 = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");


 $result14 = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");


 $result15 = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");


 $result16 = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");


 $result17 = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");



 $result19 = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");







 $query1 = "SELECT parent.id_parent, nom, prenom, email_parent FROM etudiant INNER JOIN parent ON etudiant.id_parent = parent.id_parent WHERE matricule='$id'";
 $result1 = pg_query($db_handle, $query1) or die("Cannot execute query: $query\n");



  $query2 = "SELECT DISTINCT annee_Sco FROM notes WHERE matricule ='$id' ORDER BY annee_sco ASC ";
  $result2 = pg_query($db_handle, $query2) or die("Cannot execute query: $query\n");

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/jpg" href="../../assets/img/fav.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Profil
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
</head>

       
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
          <li>
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
            <li>
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
          <li class="active ">
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
          <div class="col-md-4">
            <div class="card card-user">
              <?php
               while ($row = pg_fetch_row($result)) {

              $sexe = $row[2];

              if ($sexe=="Masculin") {
               echo '<div class="image">
                <img src="https://www.tombreton.com/wp-content/uploads/2015/05/freepik.com_banque-dimages-gratuites_tombreton.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="https://thumbs.dreamstime.com/b/homme-sur-le-lieu-de-travail-avec-les-papiers-et-l-ordinateur-73540756.jpg" alt="...">';
              }
              else
                {
               echo '<div class="image">
                <img src="https://mocah.org/uploads/posts/505165-work-pen-programming.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="https://media.istockphoto.com/vectors/teenage-girk-working-on-computer-in-classroom-vector-id1150453750?k=6&m=1150453750&s=612x612&w=0&h=Mu_UNoQRacUqqnApWUgSGFCt8oixdwUVN2nGRm_DOkM=" alt="...">';
              }
              

              echo '<h5 class="title">'.$row[0].' '.$row[1].'</h5>';
              echo '</a>
                  <p class="description">
                    @iai-togo
                  </p>
                </div>
                <p class="description text-center">
                  "Rien dans le monde ne pourra remplacer la Persistance. Le talent n’y parviendra pas ; rien n\'est plus commun que des hommes talentueux qui ont du mal à réussir. Le génie n’y parviendra pas ; le génie non récompensé est presque un proverbe. L\'éducation n’y parviendra pas ; le monde est rempli de fous instruits. Le slogan « Persévère » a résolu et résoudra toujours les problèmes de la race humaine"<br>
                  -Calvin Coolidge
                </p>
              </div>';
}
                ?>
              
                   
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                      <h7>Travail</h7>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h7>Discipline</h7>
                    </div>
                    <div class="col-lg-3 mr-auto">
                      <h7>Rigueur</h7>
                    </div>
                  </div> 
                  <br>
                  <div>  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Profil</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="Imprimer.php">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Institut</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Institut Africain d'Informatique">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" disabled="" placeholder="Nom" value="<?php
                                                while ($row = pg_fetch_row($result11)) { echo $row[0];} ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Prenom</label>
                        <input type="email" class="form-control" disabled="" placeholder="Prenom" value="<?php
                                                while ($row = pg_fetch_row($result12)) { echo $row[1];} ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" disabled="" placeholder="Email" value="<?php
                                                while ($row = pg_fetch_row($result13)) { echo $row[3];} ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Sexe</label>
                        <input type="text" class="form-control" disabled="" placeholder="Sexe" value="<?php
                                                while ($row = pg_fetch_row($result14)) { echo $row[2];} ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tuteur</label>
                        <input type="text" class="form-control" disabled="" placeholder="Tuteur" <?php 
                        while($row = pg_fetch_row($result17)) { if ($row[0] =="") {
                          echo 'value="Veuillez avertir votre tuteur de créer son compte sur la plateforme"';   
                        }else {
                          
                        }
                          }?>>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                         <label>Date de Naissance</label>
                        <input type="text" class="form-control" disabled="" placeholder="Date de Naissance" value="<?php
                                                 while ($row = pg_fetch_row($result15)) { echo $row[4];} ?>">
                      </div>
                    </div>
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Lieu de Naissance</label>
                        <input type="text" class="form-control" disabled="" placeholder="Lieu de Naissance" value="<?php
                                                 while ($row = pg_fetch_row($result16)) { echo $row[5];} ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div  style="text-align: center;" class="col-md-12">
                      <div class="form-group">
                      <label>Votre Matricule</label>
                      <input <?php echo 'value="'.$id.'"'; ?>disabled="">
                      </div>
                    </div>
                    <div style="text-align: center;" class="col-md-12">
                      <div class="form-group">
                        <h5>Imprimer vos notes </h5>
                        
                        <select style="width: 300px;" name="an">

                        <?php   
                        while ($row2 = pg_fetch_row($result2)) {

                      echo '<option>'.$row2[0].'</option>';
                    }
                     ?>
                     </select>

                      </div>
                    </div>
                    <div class="update ml-auto mr-auto">
                     <button type="submit" class="btn btn-primary btn-round">Imprimer</button>
                    <?php
                                                while ($row = pg_fetch_row($result11)) { echo $row[0];} ?>
                    </div>
                  </div>
                </form>
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

