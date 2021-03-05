<?php
require "classes/database.php";

class ModelGite extends database{

    public function ShowLogement(){

        $db = $this->getPDO();
        $req = $db->query("SELECT * FROM `logement`ORDER BY `id_logement` DESC");

        foreach($req as $row){
            ?>
                <!-- CARD -->
                <div class="col-md-4 mb-5">
                    <div class="portfolio-item mx-auto">
                        <div class="card text-center">
                            <img class="card-img-top" src="<?php echo $row['photo_logement'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['intitule_logement'] ?></h5>
                            </div>
                            <div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Nombre de chambre : <?php echo $row['chambre_logement'] ?></li>
                                    <li class="list-group-item">Situé :<?php echo $row['emplacement_logement'] ?></li>
                                    <li class="list-group-item"><?php echo $row['prix_logement'] ?>€/nuit</li>
                                </ul>
                            </div>
                        </div>
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <a href="LogementDetails.php?ID=<?=$row["id_logement"]?>"><div class="portfolio-item-caption-content text-center text-white">
                               <i class="fas fa-plus fa-3x"></i></div></a>
                        </div>
                    </div>
                </div>

            <?php
        }
    }
    public function ShowLogementAdmin(){

        $db = $this->getPDO();
        $req = $db->query("SELECT * FROM logement ORDER BY `id_logement` DESC");

        foreach($req as $row){
            ?>
                <!-- CARD -->
                <div class="col-md-4 ">
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
                                    <li class="list-group-item"><a href="ModificationLogement.php?ID=<?=$row["id_logement"]?>">Modifier</a></li>
                                    <li class="list-group-item"><a href="SuppressionLogement.php?ID=<?=$row["id_logement"]?>">Supprimer</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                    </div>
            </div>

        <?php
        }
    }
    public function ShowLogementForDelete(){

        $db = $this->getPDO();
        $req = $db->query("SELECT * FROM `logement`WHERE`id_logement`= $ID");

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
                </div>
            </div>
            </div>

            <?php
        }
    }

    public function addGite (){

        $db = $this->getPDO();

        $type_logement = $_POST['type_logement'];
        $intitule_logement = $_POST['intitule_logement'];
        $description_logement = $_POST['description_logement'];
        $photo_logement = $_POST['photo_logement'];
        $chambre_logement = $_POST['chambre_logement'];
        $sdb_logement = $_POST['sdb_logement'];
        $prix_logement = $_POST['prix_logement'];
        $emplacement_logement = $_POST['emplacement_logement'];
        $etat_logement = $_POST['etat_logement'];

        
        $reqCreate ="INSERT INTO logement (type_logement, intitule_logement, description_logement, photo_logement, chambre_logement, sdb_logement, prix_logement, emplacement_logement, dispo_logement) VALUES (?,?,?,?,?,?,?,?,?)";

        $requete_insertion = $db->prepare($reqCreate);

        $requete_insertion->bindParam(1, $type_logement);
        $requete_insertion->bindParam(2, $intitule_logement);
        $requete_insertion->bindParam(3, $description_logement);
        $requete_insertion->bindParam(4, $photo_logement);
        $requete_insertion->bindParam(5, $chambre_logement);
        $requete_insertion->bindParam(6, $sdb_logement);
        $requete_insertion->bindParam(7, $prix_logement);
        $requete_insertion->bindParam(8, $emplacement_logement);
        $requete_insertion->bindParam(9, $etat_logement);


        $requete_insertion->execute(array($type_logement, $intitule_logement, $description_logement, $photo_logement,$chambre_logement, $sdb_logement, $prix_logement, $emplacement_logement, $etat_logement));

        if($requete_insertion){
            echo "C cool";
            header("location:http://localhost/Projet_5_Gite/admin.php");
        }else{
            echo " remplir les champs";
        }
    }

    public function UpdateGite(){

        $db = $this->getPDO();

        $type_logement = $_POST['type_logement'];
        $intitule_logement = $_POST['intitule_logement'];
        $description_logement = $_POST['description_logement'];
        $photo_logement = $_POST['photo_logement'];
        $chambre_logement = $_POST['chambre_logement'];
        $sdb_logement = $_POST['sdb_logement'];
        $prix_logement = $_POST['prix_logement'];
        $emplacement_logement = $_POST['emplacement_logement'];
        $etat_logement = $_POST['etat_logement'];
        $ID = $_GET['ID'];

        $reqUpdate= $db->prepare("UPDATE `logement` SET `type_logement`= '$type_logement',`intitule_logement`= '$intitule_logement',`description_logement`= '$description_logement',`photo_logement`= '$photo_logement',`chambre_logement`= '$chambre_logement',`sdb_logement`= '$sdb_logement',`prix_logement`= '$prix_logement',`emplacement_logement`= '$emplacement_logement',`dispo_logement`= '$etat_logement' WHERE `id_logement` = ?");
        $requete_insertion=$reqUpdate->execute(array($ID));

        if($requete_insertion){
            header("location:http://localhost/Projet_5_Gite/admin.php");
        }else{
            echo " remplir les champs";
        }
    }

    public function DeleteGite(){

        $db = $this->getPDO();
        $ID = $_GET['ID'];

        $reqDelete= $db->prepare("DELETE FROM `logement` WHERE `id_logement`= ?");
        $requete_insertion=$reqDelete->execute(array($ID));

        if($requete_insertion){
            header("location:http://localhost/Projet_5_Gite/admin.php");
        }else{
            echo " EchoTest";
        }

    }

    public function LectureEtatLogement(){

        $db = $this->getPDO();
        $req = $db->query("SELECT * FROM logement");

        foreach($req as $row){
            ?>
            <option value="<?= $row['dispo_logement']?>"><?= $row['dispo_logement']?></option>
            <?php
        }
    }

    public function LectureTypeLogement(){

        $db = $this->getPDO();
        $req = $db->query("SELECT * FROM logement ");

        foreach($req as $row){
            ?>
            <option value="<?= $row['type_logement']?>"><?= $row['type_logement']?></option>
            <?php
        }
    }
}