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
        <h1>Modification du logement "<?= $res['intitule_logement']?>" :</h1>
        <div>
            <form action="ModificationLogement.php?ID=<?=$res["id_logement"]?>" method="post">
                <div class="">
                    <label for="type">Type de logement</label>
                    <select  class="form-control" required type="text" id="type_logement" name="type_logement">
                        <?php
                        $gite->LectureTypeLogement();
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="intitule">Intitule du logement</label>
                    <input value=<?= $res['intitule_logement']?> class="form-control" required type="text" id="intitule_logement" name="intitule_logement"  >
                </div>
                <div class="form-group">
                    <label for="description">Descrpition du logement</label>
                    <textarea class="form-control" required type="text" id="description_logement" name="description_logement" ><?= $res['description_logement']?></textarea>
                </div>
                <div class="form-group">
                    <label for="photo">Photo du logement</label>
                    <input value="<?= $res['photo_logement']?>" class="form-control" required type="file" id="photo_logement" name="photo_logement" accept="image/png, image/jpeg, image/svg"  >
                    <img class="imgModifFormulaire" src="<?php echo $res['photo_logement'] ?>" alt="Card image cap">
                </div>
                <div class="form-group">
                    <label for="chambre">Nombre de chambre du logement</label>
                    <input value="<?= $res['chambre_logement']?>" class="form-control" required type="number" id="chambre_logement" name="chambre_logement"  >
                </div>
                <div class="form-group">
                    <label for="sdb">Nombre de salle de bain du logement</label>
                    <input value="<?= $res['sdb_logement']?>" class="form-control" required type="number" id="sdb_logement" name="sdb_logement"  >
                </div>
                <div class="form-group">
                    <label for="prix">Prix par nuit du logement</label>
                    <input value="<?= $res['prix_logement']?>" class="form-control" required type="number" id="prix_logement" name="prix_logement"  >
                </div>
                <div class="form-group">
                    <label for="emplacement">Emplacement du logement</label>
                    <input value="<?= $res['emplacement_logement']?>" class="form-control" required type="text" id="emplacement_logement" name="emplacement_logement"  >
                </div>
                <div class="form-group">
                    <label for="etat">Etat du logement</label>
                    <select  class="form-control" required type="text" id="etat_logement" name="etat_logement">
                        <?php
                        $gite->LectureEtatLogement();
                        ?>
                    </select>
                </div>
                <!--<button type="submit" name="Modifier"> Modifier ce logement </button>-->
                <input type="submit" name="Modifier" value="Modifier ce logement" class="btn btn-success">
            </form>
        </div>
    </div>

    <?php
    if(isset($_POST['Modifier'])){
        echo "ok click Modif";
        $gite->UpdateGite();
    }



$content=ob_get_clean();
//Rappel du template sur chaque page
require "views/template.php";
?>