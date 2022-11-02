<?php
session_start();

if ($_SESSION['login']) {
  $id = $_SESSION['login'];

  $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

} else {
 
  header("location: pagerror.php");
}


 $query = "SELECT nom, prenom FROM parent WHERE id_parent ='$id'";
$result = pg_query($db_handle, $query) or die("Cannot execute query: $query\n");


$query1 = "SELECT nom_etud, prenom_etud FROM parent INNER JOIN etudiant ON parent.id_parent = etudiant.id_parent WHERE parent.id_parent ='$id'";
$result1 = pg_query($db_handle, $query1) or die("Cannot execute query: $query\n");



$query2 = "SELECT id_classe FROM parent INNER JOIN etudiant ON parent.id_parent = etudiant.id_parent WHERE parent.id_parent ='$id'";
$result2 = pg_query($db_handle, $query2) or die("Cannot execute query: $query\n");


$query3 = "SELECT COUNT(*) FROM parent INNER JOIN etudiant ON parent.id_parent = etudiant.id_parent  INNER JOIN ec ON etudiant.id_classe = ec.id_classe WHERE parent.id_parent ='$id'";
$result3 = pg_query($db_handle, $query3) or die("Cannot execute query: $query\n");



$query4 = "SELECT libelle_ue, libelle_ec, coeff, devoir, partiel, notes.annee_sco FROM etudiant INNER JOIN ec ON etudiant.id_classe = ec.id_classe
                        INNER JOIN notes ON notes.matricule = etudiant.matricule
                        INNER JOIN ue ON ue.id_ue = ec.id_ue
                        INNER JOIN parent ON parent.id_parent = etudiant.id_parent
                        WHERE parent.id_parent ='$id'
                        AND notes.id_ec= ec.id_ec
                        ORDER BY ue.id_ue";

$result4 = pg_query($db_handle, $query4) or die("Cannot execute query: $query\n");



 $query5 = "SELECT horaire_un, horaire_deux, horaire_trois, horaire_quatre, dateemp
 FROM emploidutemps
 WHERE id_classe IN (SELECT id_classe FROM parent INNER JOIN etudiant ON parent.id_parent = etudiant.id_parent WHERE parent.id_parent ='$id')
 ORDER BY id_emploi DESC
 LIMIT 5";
 $result5 = pg_query($db_handle, $query5) or die("Cannot execute query: $query\n");


 $query6 = "SELECT intitule, contenu, datenoteia FROM noteia";
 $result6 = pg_query($db_handle, $query6) or die("Cannot execute query: $query\n");


$query7 = "SELECT COUNT(*) FROM professeur";
$result7 = pg_query($db_handle, $query7) or die("Cannot execute query: $query\n");



$query8 = "SELECT COUNT(*) FROM etudiant";
$result8 = pg_query($db_handle, $query8) or die("Cannot execute query: $query\n");



 ?> 

<doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <!-- awesone fonts css-->
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- owl carousel css-->
    <link rel="stylesheet" href="owl-carousel/assets/owl.carousel.min.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link href="paper-dashboard.css" rel="stylesheet" />
    <title>Bienvenue Cher Tuteur</title>
    <style>

    </style>
</head>
<style type="text/css">

    table {
border:3px solid #63c9e0;
border-collapse:collapse;
width:90%;
margin:auto;
}
thead, tfoot {
background-color:#D0E3FA;
background-image:url(sky.jpg);
border:1px solid #63c9e0;
}
tbody {
background-color:#FFFFFF;
border:1px solid #63c9e0;
}
th {
font-family:monospace;
border:1px dotted #63c9e0;
padding:5px;
background-color:#EFF6FF;
width:20%;
}
td {
font-family:sans-serif;
font-size:80%;
border:1px solid #63c9e0;
padding:5px;
text-align:left;
}
caption {
font-family:sans-serif;
}

button  {

}

.button {
 transition-duration: 0.9s;

}

.button:hover {
  background-color: #bf7132;
  color: white;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
}
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav">
    <div class="container"><a class="navbar-brand">
        <img src="logi.png" alt="" class="img-fluid">
      
</a>
        <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse"><span
                class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span></button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="Accueil.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="#noteI">Notes de service</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Informations</a></li>
                <li class="nav-item"><a class="nav-link" href="#emp">Emploi du temps</a></li>
                <li class="nav-item"><a class="nav-link" href="#notes">Notes</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
            <form class="form-inline my-2 my-lg-0"><a href="logout.php"class="btn btn-info my-2 my-sm-0 text-uppercase">Déconexion</a>
            </form>
        </div>
    </div>
</nav>
<div class="container-fluid gtco-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1><?php
                while ($row = pg_fetch_row($result)) { echo 'Bienvenue '.$row[0].' '.$row[1];} ?> sur 
                   IAI-Online.<span> Suivez en ligne le parcours de votre enfant</span></h1>
                <p> Accédez au planning aux notes de votre enfant et aux différents notes de service relatives concernant notre établissement</p>
                <a href="#contact">Contactez-Nous <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
            <div class="col-md-6">
                <div class=""><img class="card-img-top img-fluid" src="yash.svg" alt=""></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid gtco-feature">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="cover">
                    <div class="">
                        <svg
                                class="back-bg"
                                width="100%" viewBox="0 0 900 700" style="position:absolute; z-index: -1">
                            <defs>
                                <linearGradient id="PSgrad_01" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                                    <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1"/>
                                    <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1"/>
                                </linearGradient>
                            </defs>
                            <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_01)"
                                  d="M616.656,2.494 L89.351,98.948 C19.867,111.658 -16.508,176.639 7.408,240.130 L122.755,546.348 C141.761,596.806 203.597,623.407 259.843,609.597 L697.535,502.126 C748.221,489.680 783.967,441.432 777.751,392.742 L739.837,95.775 C732.096,35.145 677.715,-8.675 616.656,2.494 Z"/>
                        </svg>
                        <!-- *************-->

                        <svg width="100%" viewBox="0 0 700 500">
                            <clipPath id="clip-path">
                                <path d="M89.479,0.180 L512.635,25.932 C568.395,29.326 603.115,76.927 590.357,129.078 L528.827,380.603 C518.688,422.048 472.661,448.814 427.190,443.300 L73.350,400.391 C32.374,395.422 -0.267,360.907 -0.002,322.064 L1.609,85.154 C1.938,36.786 40.481,-2.801 89.479,0.180 Z"></path>
                            </clipPath>
                            <!-- xlink:href for modern browsers, src for IE8- -->
                            <image clip-path="url(#clip-path)" xlink:href="yeah.jpg" width="100%"
                                   height="465" class="svg__image"></image>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h2>Vous avez la charge de <?php
                while ($row1 = pg_fetch_row($result1)) { echo ''.$row1[0].' '.$row1[1];} ?></h2>
                <p> Cultivez dès le plus jeune âge et développez en vos enfants les instincts élevés de notre nature, sur lesquels se fonde l'existence sociale, le sentiment de la justice et de l'ordre, de la commisération et de la charité. L'enseignement donné sur les genoux d'une mère et les leçons paternelles, confondus avec les souvenirs pieux et doux du foyer domestique, ne s'effacent jamais de l'âme entièrement. </p>
                <p>
                    <small>~Félicité Robert de Lamennais
                    </small>
                </p>
                </div>
        </div>
    </div>
</div>
<div class="container-fluid gtco-features" id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <br>
                <br>
<img class="card-img-top img-fluid" src="exam.svg" alt="">
                <br>
                <br>
<img class="card-img-top img-fluid" src="bruh.svg" alt="">
            </div>
            <div class="col-lg-8">
                <svg id="bg-services"
                     width="100%"
                     viewBox="0 0 1000 800">
                    <defs>
                        <linearGradient id="PSgrad_02" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                            <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1"/>
                            <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1"/>
                        </linearGradient>
                    </defs>
                    <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_02)"
                          d="M801.878,3.146 L116.381,128.537 C26.052,145.060 -21.235,229.535 9.856,312.073 L159.806,710.157 C184.515,775.753 264.901,810.334 338.020,792.380 L907.021,652.668 C972.912,636.489 1019.383,573.766 1011.301,510.470 L962.013,124.412 C951.950,45.594 881.254,-11.373 801.878,3.146 Z"/>
                </svg>
                <div class="row">
                    <div class="col">
                        <div class="card text-center">
                            <div class="oval"><img class="card-img-top" src="images/web-design.png" alt=""></div>
                            <div class="card-body">
                                <h3 class="card-title">Classe</h3>
                                <p class="card-text"><?php
                while ($row2 = pg_fetch_row($result2)) { echo ''.$row2[0];} ?></p>
                            </div>
                        </div>
                        <div class="card text-center">
                            <div class="oval"><img class="card-img-top" src="images/marketing.png" alt=""></div>
                            <div class="card-body">
                                <h3 class="card-title"></h3>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center">
                            <div class="oval"><img class="card-img-top" src="images/seo.png" alt=""></div>
                            <div class="card-body">
                                <h3 class="card-title">Nombre de Matières</h3>
                                <p class="card-text"><?php
                while ($row3 = pg_fetch_row($result3)) { echo ''.$row3[0];} ?></p>
                            </div>
                        </div>
                        <div class="card text-center">
                            <div class="oval"><img class="card-img-top" src="images/graphics-design.png" alt=""></div>
                            <div class="card-body">
                                <h3 class="card-title"></h3>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid gtco-features-list">
    <div class="container" id="emp">
        <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Consultez l'emploi du temps de votre enfant</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                           <?php  
   while ($row5 = pg_fetch_row($result5)) {?>


      <br>
      <br>
      <br>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" disabled="" class="form-control"<?php echo'value="Emploi du temps du '.$row5[4].'"';?>>
                      </div>
                    </div>
                  </div>


   
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>1ère Séance</label>
                        <input type="text" disabled="" class="form-control" <?php echo'value="'.$row5[0].'"';?>>
                        
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>2e séance</label>
                        <input type="text" disabled="" class="form-control"<?php echo'value="'.$row5[1].'"';?>>
                      </div>
                    </div>

                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>3e Séance</label>
                        <input type="text" disabled="" class="form-control" <?php echo'value="'.$row5[2].'"';?>>
                        
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>4e séance</label>
                        <input type="text" disabled="" class="form-control"<?php echo'value="'.$row5[3].'"';?>>
                      </div>
                    </div>

                  </div>

                  

                  

                  <?php
                } 

?>
                        </div>
                      
                    </div>
                </div>
    </div>
</div>

<div class="container-fluid gtco-numbers-block">
    <div class="container">
        <svg width="100%" viewBox="0 0 1600 400">
            <defs>
                <linearGradient id="PSgrad_03" x1="80.279%" x2="0%"  y2="0%">
                    <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1" />
                    <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1" />

                </linearGradient>

            </defs>
            <!-- <clipPath id="clip-path3">

                                      </clipPath> -->

            <path fill-rule="evenodd"  fill="url(#PSgrad_03)"
                  d="M98.891,386.002 L1527.942,380.805 C1581.806,380.610 1599.093,335.367 1570.005,284.353 L1480.254,126.948 C1458.704,89.153 1408.314,59.820 1366.025,57.550 L298.504,0.261 C238.784,-2.944 166.619,25.419 138.312,70.265 L16.944,262.546 C-24.214,327.750 12.103,386.317 98.891,386.002 Z"></path>

            <clipPath id="ctm" fill="none">
                <path
                        d="M98.891,386.002 L1527.942,380.805 C1581.806,380.610 1599.093,335.367 1570.005,284.353 L1480.254,126.948 C1458.704,89.153 1408.314,59.820 1366.025,57.550 L298.504,0.261 C238.784,-2.944 166.619,25.419 138.312,70.265 L16.944,262.546 C-24.214,327.750 12.103,386.317 98.891,386.002 Z"></path>
            </clipPath>

            <!-- xlink:href for modern browsers, src for IE8- -->
            <image  clip-path="url(#ctm)" xlink:href="images/word-map.png" height="800px" width="100%" class="svg__image">

            </image>

        </svg>
        <div class="row">
            <div class="col-3">
                <div class="">
                    <div class="card-body">
                        <h5 class="card-title">12</h5>
                        <p class="card-text">Nombres de salles de classe</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="">
                    <div class="card-body">
                        <h5 class="card-title"><?php
                while ($row7 = pg_fetch_row($result7)) { echo ''.$row7[0];} ?></h5>
                        <p class="card-text">Nombre de professeurs</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="">
                    <div class="card-body">
                        <h5 class="card-title"><?php
                while ($row8 = pg_fetch_row($result8)) { echo ''.$row8[0];} ?></h5>
                        <p class="card-text">Nombres d'élèves</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="">
                    <div class="card-body">
                        <h5 class="card-title">5</h5>
                        <p class="card-text">Nombre de salles de Travaux Pratiques</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <?php  


 while ($row4 = pg_fetch_row($result4)){
    echo '
<div class="container-fluid gtco-logo-area">
    <div class="container" id="notes">
        <div class="row">
           <div class="col-md-1"></div>
          <div class="col-md-11">
            <div class="card ">
              <div class="card">
              <div class="card-header">
                <h4 class="card-title">Liste des notes '.$row4[5].' </h4>
              </div>
              <div class="card-body">
                <div id="divName" class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Unité d\'Enseignement
                      </th>
                      <th>
                        Matière
                      </th>
                      <th>
                        Coefficient
                      </th>
                      <th>
                        Devoir
                      </th>
                      <th>
                        Partiel
                      </th>
                    </thead>
                    <tbody>
                      
   <tr>
         <td>'.$row4[0].'</td>
         <td>'.$row4[1].'</td>
         <td>'.$row4[2].'</td>
         <td>'.$row4[3].'</td>
         <td>'.$row4[4].'</td>

   </tr>
    

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
 ';}?>


<div class="container-fluid gtco-news" id="noteI">
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card card-user">
              <?php
               while ($row6 = pg_fetch_row($result6)) { ?>
               <div class="image">
                <img src="images/crack.jpg" alt="">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="images/cool.jpg" alt="...">';
              

              <h5 class="title">Note d'information de l'administration</h5>
                   </a>
                  <p class="description">
                    Note du <?php echo 'Note du '.$row6[2]; ?>
                  </p>
                </div>
                <p class="description text-center">
                  <?php echo ''.$row6[0]; ?><br>
                  <?php echo ''.$row6[1]; ?>
                  
                </p>
              </div>

              
                   
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-6 ml-auto">
                      <h7>Fait à Lomé</h7>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 ml-auto mr-auto">
                      <h7>Le <?php echo ''.$row6[2]; ?></h7>
                    </div>
                    
                  </div> 
                  <br>
                  <div>  </div>
                </div>
              </div>

              <?php }
                ?>
            </div>

            </div>

          </div>
          </div>
</div>
<footer class="container-fluid" id="gtco-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" id="contact">
                <h4> Contactez-Nous </h4>
                <input type="text" disabled="" class="form-control" value="59 rue de la Kozah Nyékonakpoè">
                <input type="text" class="form-control" disabled="" value="Lomé" >
                <input type="text" class="form-control" disabled="" value="+228 22 20 47 00" >
                
                <h4 class="text-center">A propos de nous</h4>
                        <p>L’IAI (Institut Africain d’informatique) dans sa forme actuelle est une Association créée en 1971 et regroupant onze (11) Etats membres dont le TOGO. L’IAI-TOGO est une représentation de l’IAI-siège qui se trouve à Libreville (GABON). <br> Elle a ouvert ses portes au TOGO dans l’enceinte du CENETI (Centre National d’Etudes et de Traitements Informatiques) en Octobre 2002. Elle forme en trois (3) filières : Génie Logiciel ;  Systèmes et Réseaux ;  Multimédia, Programmation Web, Infographie
</p>
            </div>
            <div class="col-lg-6">
        <div class="row">
                  <ul class="list-unstyled li-space-lg">
                        <li class="address">Vous pouvez nous retrouver du lundi au vendredi de 8h à 17h</li>
                    </ul>
                    
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.041154749313!2d1.2104534999999998!3d6.1251642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10215f618ff4057f%3A0x283893dcd5d0ac3b!2sIAI-TOGO!5e0!3m2!1sfr!2stg!4v1599313725503!5m2!1sfr!2stg" width="1180" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                  
            </div>                    
        </div>
        </div>
    </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- owl carousel js-->
<script src="owl-carousel/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
