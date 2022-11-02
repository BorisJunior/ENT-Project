 <?php
session_start();


if(isset($_POST['email'])&&!empty($_POST['pass'])){


$db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");


 $login = $_POST['email'];
 $password = $_POST['pass'];
 
 $sql = "SELECT professeur.id_prof FROM professeur INNER JOIN dispensercours ON professeur.id_prof = dispensercours.id_prof WHERE email_prof = '$login' AND password_prof = '$password' AND dispensercours.id_classe IS NOT NULL";
 $data = pg_query($db_handle,$sql); 
 $login_check = pg_num_rows($data);


if($login_check > 0){ 

        while ($row = pg_fetch_row($data)) {
      
      $_SESSION['login'] =$row[0] ;
    }

       header("location: ../xFrontEnd/pageprof.php");
  
    }else{
        
        echo "Votre n'a pas été activé. Veuillez contacter l'admin";
    }

}
else{
        
        echo "Remplissez tous les champs";
    }


?>