
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
if ($result = mysqli_query($conn, "SELECT hobby.HOBID as H,HOBNOM,HOBDESCRI,LOGID FROM hobby left join adore on adore.HOBID=hobby.HOBID and LOGID=".$_SESSION['logid']."  ORDER BY H ")) {
//    printf("Select a retourné %d lignes.\n", mysqli_num_rows($result));

?> 

<a href="hobbyadd.php"> Ajouter un hobby</a> <br> <br>

<table>
    <tr>
        <td>HOBBY</td>
        <td>DESCRIPTION</td>  
        <td>AIME</td>
        
        <td>CHOIX</td>
    </tr>
    <?php
    
    /* Récupère un tableau associatif */
    while ($row = $result->fetch_assoc()) {
        if ($row["LOGID"]==$_SESSION['logid'])
        {
        printf ("<tr><td><a href='hobby.php?hobid=".$row["H"]."'>%s</a></td><td> <i>%s</i></td><td align='center'><img src='ok.png' width='20' height='20'></td><td align='center'><a href='choixsup.php?hobid=".$row["H"]."'><img src='del.png' width='20' height='20' border='0'></a></td></tr>", $row["HOBNOM"], $row["HOBDESCRI"]);
        }
        else {
        printf ("<tr><td><a href='hobby.php?hobid=".$row["H"]."'>%s</a></td><td> <i>%s</i></td><td></td><td align='center'><a href='choixadd.php?hobid=".$row["H"]."'><img src='add.png' width='20' height='20' border='0'></a></td></tr>", $row["HOBNOM"], $row["HOBDESCRI"]);
       
        }
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