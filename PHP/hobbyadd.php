
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
            
            </div>
            <div id="container">
            
       <form action="hobbyverif.php" method="POST">
                <h1>Ajouter un hobby</h1>
                
                <label><b>Nom du hobby</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="hobnom" required>

                <label><b>Description du hobby</b></label>
                <TEXTAREA name="hobdescri" rows=4 cols=40></TEXTAREA>

                <input type="submit" id='submit' value='AJOUTER' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>un champ est incorrect</p>";
                }
                ?>
            </form> 
            
            
        </div>
    </body>
</html>