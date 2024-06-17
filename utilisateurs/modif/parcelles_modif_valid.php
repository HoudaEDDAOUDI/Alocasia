<?php
    include('../../autres_pages/header.php');
?>
    <!------------- NE MARCHE PAS ------------>
    <hr>
    <?php
    $type_plantations=$_POST['type_plantations'];
    $num=$_POST['num'];

    include('../../admin/pdo.php');
    $mabd->query('SET NAMES utf8;');

    
    $req = 'UPDATE parcelles SET parcelles_plantations="'.$type_plantations.'" WHERE parcelles_id="'.$num.'';
    echo 'juste pour le debug:'.$req;
    $resultat = $mabd->query($req);
    ?>
    <?php 
        header ('../profil.php');
    ?>
</body>
</html>