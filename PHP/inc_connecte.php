            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if($_SESSION['connecte'] !== 1)
                { 
                        session_unset();
                        header("location:login.php");
                }
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<br>Bonjour $user, vous êtes connectés";
                }
                if($_SESSION['droid'] !== ""){
                    $droid = $_SESSION['droid'];
                    // afficher un message
                    echo "<br>Vous êtes un $droid";
                }
                 // test si le bouton deconnexion est cliqué
                 if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:login.php");
                   }
                }
            ?>
         