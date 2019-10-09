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
    
           //enregistre la connexion en base
           
             $sql = "INSERT INTO log (LOGIN,PASSWORD,DATE_CRE,DROID ) VALUES ('".$username."','".$password."', '".date("Y/m/d G:i")."',2)";

            if ($db->query($sql) === TRUE) {
               echo "New record created successfully";
            } else {
                 echo "Error: " . $sql . "<br>" . $db->error;
            }
        
        //redirige vers le site principal
         header('Location: login.php');
        
    }
    else
    {
       $_SESSION['connecte'] = 0;
       header('Location: create.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: create.php');
}
mysqli_close($db); // fermer la connexion
?>