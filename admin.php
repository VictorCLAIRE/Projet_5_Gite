<?php
ob_start();

require "classes/Model_Gite.php";
$gite= new ModelGite();
?>
<div class="container-fluid">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid text-center">
    <h1>Gestion des logements :</h1>
    <a href="AjoutLogement.php">Ajouter d'un logement</a>
    
        <div class="container-fluid row mt-3">
            <?php
            $gite->ShowLogementAdmin();
            ?>
        </div>
    </div>
</div>

<?php
    $content = ob_get_clean();
    //Rappel du template sur chaque page
    require "views/template.php";
?>


    </body>
</html>