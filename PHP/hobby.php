
<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body >
        <div id="content">
            
        
            
     <!-- tester si l'utilisateur est connecté -->
            <?php 
          include("inc_connecte.php"); 
            ?>
            
            
    <!-- affiche le menu -->
            <?php 
          include("inc_menu.php"); 
            ?>
            
 <?php

if (isset ($_GET["hobid"])) {


    $hobid= $_GET["hobid"] ;
   // print($hobid)   ;  
$servername = "localhost";
$username = "root";
$password = "";
$base= "PERSO";

// Create connection
$conn = new mysqli($servername, $username, $password, $base);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully<br>";


/* Requête "Select" retourne un jeu de résultats */
if ($result = mysqli_query($conn, "SELECT hobby.HOBID as H,HOBNOM,HOBDESCRI,log.LOGID as L,LOGIN FROM hobby join adore on adore.HOBID=hobby.HOBID and adore.HOBID=".$hobid." join log on log.LOGID=adore.LOGID ORDER BY H ")) {
//    printf("Select a retourné %d lignes.\n", mysqli_num_rows($result));

?> 

  <a href="listehob.php">Retour liste des hobby</a>  <br> <br>

<table>
    <tr>
        <td>HOBBY</td>
        <td>DESCRIPTION</td>  
        <td>QUI</td>  

    </tr>
    <?php
    
    /* Récupère un tableau associatif */
    while ($row = $result->fetch_assoc()) {

        printf ("<tr><td>%s</a></td><td> <i>%s</i></td><td>%s</a></td>", $row["HOBNOM"], $row["HOBDESCRI"],$row["LOGIN"]);
    
    }

  /* Libération du jeu de résultats */
    mysqli_free_result($result);
}
$conn->close();
}
?>
</table>
            
          
            
        </div>
    </body>
</html>