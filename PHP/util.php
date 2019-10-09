
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
if ($result = mysqli_query($conn, "SELECT * from log, droit where droit.DROID=log.DROID ORDER BY LOGIN")) {
//    printf("Select a retourné %d lignes.\n", mysqli_num_rows($result));

?> 
<table>
    <tr>
        <td>LOGIN</td>
        <td>DATE CREATION</td>
        <td>DROIT</td>
    </tr>
    <?php
    
    /* Récupère un tableau associatif */
    while ($row = $result->fetch_assoc()) {
        printf ("<tr><td>%s</td><td> (%s)</td><td> <i>%s</i></td></tr>", $row["LOGIN"], $row["DATE_CRE"],$row["DRONOM"]);
    }

  /* Libération du jeu de résultats */
    mysqli_free_result($result);
}
$conn->close();
?>
</table>
            
            
        </div>
    </body>
</html>