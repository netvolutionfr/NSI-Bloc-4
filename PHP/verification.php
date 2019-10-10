<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $base= "PERSO";
    $db = new mysqli($servername, $username, $password, $base);
    // Check connection
    if ($db->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully<br>";


    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*),DROID FROM log where 
              LOGIN = '".$username."' and PASSWORD = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
       

       
       
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
            //recuperation du droit de l'utilisateur 
            $requete2 = "SELECT DRONOM, LOGID FROM log,droit where droit.DROID=log.DROID and LOGIN = '".$username."' and PASSWORD = '".$password."' ";
            $exec_requete2 = mysqli_query($db,$requete2);            
            $reponse2      = mysqli_fetch_array($exec_requete2);
            $droid = $reponse2['DRONOM'];
            $logid = $reponse2['LOGID'];
            
            //sauvegarde en session 
           $_SESSION['logid'] = $logid;
           $_SESSION['droid'] = $droid;
           $_SESSION['connecte'] = 1;
           $_SESSION['username'] = $username;
           //enregistre la connexion en base
           
             $sql = "INSERT INTO connecte (CONLOGIN,CONDATE ) VALUES ('".$username."', '".date("Y/m/d G:i")."')";

            if ($db->query($sql) === TRUE) {
               echo "New record created successfully";
            } else {
                 echo "Error: " . $sql . "<br>" . $db->error;
            }
        
        //redirige vers le site principal
         header('Location: principale.php');
        }
        else
        {
           $_SESSION['connecte'] = 0;
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       $_SESSION['connecte'] = 0;
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>