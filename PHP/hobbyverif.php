<?php
session_start();
if(isset($_POST['hobnom']) && isset($_POST['hobdescri']))
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
    $hobnom = mysqli_real_escape_string($db,htmlspecialchars($_POST['hobnom'])); 
    $hobdescri = mysqli_real_escape_string($db,htmlspecialchars($_POST['hobdescri']));
    
    if($hobnom !== "" && $hobdescri !== "")
    {
        

           
             $sql = "INSERT INTO hobby (HOBNOM,HOBDESCRI ) VALUES ('".$hobnom."', '".$hobdescri."')";

            if ($db->query($sql) === TRUE) {
               echo "New record created successfully";
            } else {
                 echo "Error: " . $sql . "<br>" . $db->error;
            }
        
        //redirige vers le site principal
         header('Location: listehob.php');
        }
        else
        {
           $_SESSION['connecte'] = 0;
           header('Location: hobbyadd.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
  
mysqli_close($db); // fermer la connexion
   }
?>