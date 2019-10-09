<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
echo 'welcome<br>';

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
echo "Connected successfully<br>";


/* Requête "Select" retourne un jeu de résultats */
if ($result = mysqli_query($conn, "SELECT * from log")) {
    printf("Select a retourné %d lignes.\n", mysqli_num_rows($result));

 /* Récupère un tableau associatif */
    while ($row = $result->fetch_assoc()) {
        printf ("<br>%s (%s)\n", $row["LOGIN"], $row["PASSWORD"]);
    }


    /* Libération du jeu de résultats */
    mysqli_free_result($result);
}
$conn->close();
?>