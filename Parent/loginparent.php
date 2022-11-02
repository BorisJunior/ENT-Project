<?php

function random_1($car) {
    $string = "";
    $chaine = "AZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
    srand((double)microtime()*1000000);
    for($i=0; $i<$car; $i++) {
    $string .= $chaine[rand()%strlen($chaine)];
    }
    return $string;
    }

    $mat = random_1(5);
  ?>
  <!DOCTYPE html>
<html>
<head>
  <title>Bienvenue Cher Tuteur</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="stylasparent.css">
  <link rel="icon" type="image/jpg" href="../assets/img/fav.jpg">
  
</head>
<body>
  <form method="POST" action="traitementparentin.php">
  <div class="cont">
    <div class="form sign-in">
      <h2>Se connecter</h2>
      <label>
        <br><br><br>
        <span>Adresse Email</span>
        <input type="email" name="email">
      </label>
      <label>
        <span>Mot de passe</span>
        <input type="password" name="pass">
      </label>
      <button class="submit" type="submit">Se Connecter</button>
      <div class="social-media">
        
      </div>
    </div>
    </form>
    <form method="POST" action="traitementparentup.php">
    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>La première fois que vous vous accéder à notre plateforme ?</h2>
          <p>Inscrivez-vous ici</p>
        </div>
        <div class="img-text m-in">
          <h2>Avez-vous déja un compte ?</h2>
          <p>Connectez vous à votre compte ici</p>
        </div>
        <div class="img-btn">
          <span class="m-up">S'inscrire</span>
          <span class="m-in">Se Connecter</span>
        </div>
      </div>
      <div class="form sign-up">
        <h2>S'inscrire</h2>
        <label>
          <span>Nom du parent ou tuteur</span>
          <input type="text" name="nom">
        </label>
        <label>
          <span>Prenom du parent ou tuteur</span>
          <input type="text" name="prenom">
        </label>
        <label>
          <span>Telephone du parent ou tuteur</span>
          <input type="text" name="teleph" value="+228 ">
        </label>
        <label>
          <span>Matricule de l'étudiant</span>
          <input type="text" name="nomE">
        </label>
        <label>
          <span>Email</span>
          <input type="email" name="email">
        </label>
        <label>
          <span>Mot de passe</span>
          <input type="password" name="password">
        </label>
        <button type="submit" class="submit">S'incrire</button>
        <label>
        <input type="hidden" name="id_parent" value="<?php echo "".$mat."" ?>" >
      </label>
      </div>
    </div>
  </div>
  </form>
<script type="text/javascript" src="script.js"></script>
</body>
</html>

