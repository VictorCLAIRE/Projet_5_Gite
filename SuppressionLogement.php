<?php
    ob_start();
    require "classes/Model_Gite.php";
    $gite = new ModelGite();

    $db = $gite->getPDO();
    $ID = $_GET['ID'];

    $req = $db->prepare('SELECT * FROM logement WHERE id_logement = ?');
    $req->execute(array($ID));
    $res = $req->fetch(PDO::FETCH_ASSOC);
?>
    <div class="container-fluid text-center">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>Suppresion du logement "<?= $res['intitule_logement']?>" :</h1>
    <?php
        $db = $gite->getPDO();
        $req = $db->query("SELECT * FROM logement WHERE`id_logement`= $ID");

        foreach($req as $row){
    ?>
    <!-- CARD -->
    <div class="">
        <div class="portfolio-item mx-auto">
            <div class="card text-center"">
            <img class="card-img-top" src="<?php echo $row['photo_logement'] ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['intitule_logement'] ?></h5>
            </div>
            <div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">iD logement: <?php echo $row['id_logement'] ?></li>
                    <li class="list-group-item"><?php echo $row['type_logement'] ?></li>
                    <li class="list-group-item">Description: <?php echo $row['description_logement'] ?></li>
                    <li class="list-group-item">Etat: <?php echo $row['dispo_logement'] ?></li>
                    <li class="list-group-item">Situé :<?php echo $row['emplacement_logement'] ?></li>
                    <li class="list-group-item">Nombre de chambre : <?php echo $row['chambre_logement'] ?></li>
                    <li class="list-group-item">Nombre de salle de bain: <?php echo $row['sdb_logement'] ?></li>
                    <li class="list-group-item"><?php echo $row['prix_logement'] ?>€/nuit</li>
                </ul>
            </div>
            <form  method="post">
                <input type="submit" name="Supprimer" value="Supprimer ce logement" class="btn btn-success">
            </form>
        </div>
    </div>
    </div>
    <?php
    }

    if (isset($_POST['Supprimer'])) {
    echo "ok click Suppr";
    $gite->DeleteGite();
    }


$content=ob_get_clean();
//Rappel du template sur chaque page
require "views/template.php";
?>