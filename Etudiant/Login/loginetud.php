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
  <title>Bienvenue Cher Etudiant</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../styletudian.css">
  <link rel="icon" type="image/jpg" href="../../assets/img/fav.jpg">
</head>
<body>
  <form method="POST" action="traitementetudin.php">
  <div class="cont">
    <div class="form sign-in">
      <h2>Se Connecter</h2>
      <br>
      <br>
      <br>
      <br>
      <label>
        <span>Adresse Email</span>
        <input type="email" name="email">
      </label>
      <br>
      <br>
      <label>
        <span>Mot de passe</span>
        <input type="password" name="pass">
      </label>
      <br>
      <br>
      <button class="submit" type="submit">Se Connecter</button>

    </div>
    </form>
    <form method="POST" action="traitementetudup.php">
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
        <h3>S'inscrire</h3>
        <label>
          <span>Nom</span>
          <input type="text" name="nom">

        </label>
        <label>
          <span>Prénoms</span>
          <input type="text" name="prenom">
        </label>
        <label>
          <span>Date de naissance</span>
          <input type="Date" name="date" min="1995-12-31" max="2005-12-31" >
        </label>
        <label>
          <span>Lieu de naissance</span>
          <input type="text" name="lieu">
        </label>
        <label>
          <span>Sexe</span>
          <select name="sexe">
           <option>Masculin</option>
           <option>Féminin</option>

          </select>
           </label>
        </label>
        <label>
          <span>Email</span>
          <input type="email" name="email">
        </label>
        <label>
          <span>Mot de passe</span>
          <input type="password" name="password">
        </label>
        <button type="submit" class="submit">S'inscrire</button>

        <label>
        <input type="hidden" name="matricule" value="<?php echo "".$mat."" ?>" >
      </label>

      </div>
    </div>
  </div>
  </form>
<script type="text/javascript" src="../script.js"></script>
</body>
</html>

