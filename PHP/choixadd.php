<?php
session_start();
if (isset ($_GET["hobid"])) {


    $hobid= $_GET["hobid"] ;
    //print($hobid)   ;
 
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

     
    
    if($hobid !== "" )
    {
        

           
             $sql = "INSERT INTO adore (HOBID,LOGID ) VALUES ('".$hobid."', '".$_SESSION['logid']."')";

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
           header('Location: listehob.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
  
mysqli_close($db); // fermer la connexion
   }
?>