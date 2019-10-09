 <table>
            <tr>
                <td>MENU</td>
                <td>|</td>
                <td><a href='principale.php'>Page principale</a></td>
                <td>|</td>
                <td><a href='util.php'>Liste des utilisateurs</a></td>
                <td>|</td>
                <td><a href='principale.php?deconnexion=true'>Déconnexion</a></td>
            </tr>
        </table>
        
 <?php
 if($_SESSION['droid'] == "ADMINISTRATEUR")
 {
 ?>
  <br>
   <table>
            <tr>
                <td>MENU ADMIN</td>
                <td>|</td>
                <td><a href='listeco.php'>Liste des connexions</a></td>
                <td>|</td>
                 <td><a href='listepass.php'>Liste des Mots de passe</a></td>
                <td>|</td>
            </tr>
        </table>
  <?php
 }
 ?>