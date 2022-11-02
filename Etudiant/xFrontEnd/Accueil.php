<?php
session_start();

if ($_SESSION['login']) {
  $id = $_SESSION['login'];

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

} else {
 
  header("location: pagerror.php");
}



 $query = "SELECT nom_etud, prenom_etud, etudiant.id_classe, niveau FROM etudiant INNER JOIN classe ON etudiant.id_classe= classe.id_classe WHERE
  matricule ='$id'";
$result = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");


$query2 = "SELECT classe.id_classe, classe.niveau FROM etudiant INNER JOIN classe ON etudiant.id_classe= classe.id_classe WHERE
  matricule ='$id'";
$result2 = pg_query($db_handle, $query2) or die("Cannot execute query: $query\n");
$result3 = pg_query($db_handle, $query2) or die("Cannot execute query: $query\n");



 $query1 = "SELECT COUNT(*) FROM etudiant INNER JOIN ec ON etudiant.id_classe = ec.id_classe WHERE
  matricule='$id' ";
  $result1 = pg_query($db_handle, $query1) or die("Cannot execute query: $query\n");

?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/jpg" href="../../assets/img/fav.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Page Etudiant
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
  <div class="wrapper">
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
          <li class="active ">
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
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
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
                    <a class="nav-link page-scroll" href="#header">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#services">Informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">Localisation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#request">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="profil.php"  style="color: #63d11f;">Vous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="logout.php" style="color: #fca103;">Déconnexion</a>
                </li>

            </ul>
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


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                   <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1><span class="turquoise"><?php
                                                while ($row = pg_fetch_row($result)) { echo 'Bienvenue '.$row[0].' '.$row[1];} ?></span></h1>
                            <p class="p-large">Voici votre page officielle pour la consultation de vos données en ligne</p>
                           
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-5">
                        <div class="image-container">
                            <img class="img-fluid" src="../images/about-extra-1.svg" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

    <!-- Services -->
    <div id="services" class="cards-1">
        <div class="container">
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of services -->


    <!-- Details 1 -->
    <div class="basic-1">
        <div class="container">
            <div class="row">
              <div class="col-lg-1"></div>
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Vous êtes en <?php
                                                while ($row = pg_fetch_row($result2)) { echo $row[0];} ?> </h2>
                        <p><?php
                                                while ($row1 = pg_fetch_row($result3)) { echo $row1[1];} ?></p>
                       </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-5">
                    <div class="image-container">
                        <img class="img-fluid" src="../images/details-1-office-worker.svg" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of details 1 -->

    
    <!-- Details 2 -->
    <div class="basic-2">
        <div class="container">
            <div class="row">
              <div class="col-lg-1"></div>
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="../images/details-2-office-team-work.svg" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-5">
                    <div class="text-container">
                        <h2> Vous avez <?php 
                                              while ($row1 = pg_fetch_row($result1)) { echo $row1[0];} ?> matières à valider cette année</h2>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Apprendre au jour le jour</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">90% du boulot se fait chez soi</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">L'informatique est très vaste, ne cessez jamais de rechercher, de progreser</div>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 2 -->

    <!-- Contact -->
    <div id="contact" class="form-2">
        <div class="container">
            <div class="row">
              <div class="col-lg-1"></div>
                <div class="col-lg-11">
                    <h2>Nos Contacts</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="address">N'hésitez pas à nous contacter</li>
                        <li><i class="fas fa-map-marker-alt"></i>59 rue de la Kozah Nyékonakpoè</li>
                        <li><i class="fas fa-phone"></i><a class="turquoise" href="tel:0022822204700">(00228) 22 20 47 00</a></li>
                        <li><i class="fas fa-envelope"></i><a class="turquoise" href="mailto:iaitogo@iai-togo.tg">iaitogo@iai-togo.tg</a></li>
                    </ul>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
               <div class="col-lg-12">
                  <ul class="list-unstyled li-space-lg">
                        <li class="address">Vous pouvez nous retrouver du lundi au vendredi dans nos locaux de 8h à 17h</li>
                    </ul>
                    
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.041154749313!2d1.2104534999999998!3d6.1251642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10215f618ff4057f%3A0x283893dcd5d0ac3b!2sIAI-TOGO!5e0!3m2!1sfr!2stg!4v1599313725503!5m2!1sfr!2stg" width="1180" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                  
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-2 -->
    <!-- end of contact -->
    
      <br>
      <br>
      <br>
      <br>



        <div id="request">
    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
              <div class="col-lg-1"></div>
                <div class="col-md-6">
                    <div class="footer-col">
                        <h4>A propos de nous</h4>
                        <p>L’IAI (Institut Africain d’informatique) dans sa forme actuelle est une Association créée en 1971 et regroupant onze (11) Etats membres dont le TOGO. L’IAI-TOGO est une représentation de l’IAI-siège qui se trouve à Libreville (GABON). <br> Elle a ouvert ses portes au TOGO dans l’enceinte du CENETI (Centre National d’Etudes et de Traitements Informatiques) en Octobre 2002. Elle forme en trois (3) filières : Génie Logiciel ;  Systèmes et Réseaux ;  Multimédia, Programmation Web, Infographie
</p>
                    </div>
                </div> <!-- end of col -->

                <div class="col-md-5">
                    <div class="footer-col last">
                        <h4>Réseaux sociaux</h4>
                        <span class="fa-stack"  >
                            <a href="https://www.facebook.com/ReseauDesAnciensEtudiantsDeLiaiTogo/" target="blank">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://twitter.com/home" target="blank">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://myaccount.google.com/profile" target="blank">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-google-plus-g fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://www.instagram.com/" target="blank">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://fr.linkedin.com/" target="blank">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->

</div>

  <div id="request">
    <!-- Footer -->
    <div class="footer">
        <div class="container">

      <br>
          
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->

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
