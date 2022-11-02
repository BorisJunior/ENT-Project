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
  <title>Bienvenue Cher Professeur</title>
  <link rel="icon" type="image/jpg" href="../../assets/img/fovio.jpg">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../style.css">
  
</head>
<body>
  <form method="POST" action="traitementprofin.php">
  <div class="cont">
    <div class="form sign-in">
      <h2>Se Connecter</h2>
      <label>
        <span>Adresse Email</span>
        <input type="email" name="email">
      </label>
      <label>
        <span>Mot de passe</span>
        <input type="password" name="pass">
      </label>
      <button class="submit" type="submit">Se Connecter</button>
      
    </div>
    </form>
    <form method="POST" action="traitementprofup.php"  name="formSaisie">
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
          <span>Nom</span>
          <input type="text" name="nom" onblur="return valider()">
        </label>
        <label>
          <span>Prenoms</span>
          <input type="text" name="prenom" onblur="return valider()">
        </label>
        <label>
          <span>Telephone</span>
          <input type="text" name="teleph" value="+228 ">
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
        <input type="hidden" name="id_prof" value="<?php echo "".$mat."" ?>" >
      </label>
      </div>
    </div>
  </div>
  </form>
<script type="text/javascript" src="../script.js"></script>
<script type="text/javascript">
  function valider() {
   
  if(document.formSaisie.nom.value== " " document.formSaisie.prenom.value== " ") {
     alert("Veuillez remplir tous les champs");
  }
 
 
}
</script>
</body>
</html>

