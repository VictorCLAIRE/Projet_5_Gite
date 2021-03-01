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
                        <div class="card text-center"">
                            <img class="card-img-top" src="<?php echo $row['photo_logement'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['intitule_logement'] ?></h5>
                            </div>
                            <div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?php echo $row['chambre_logement'] ?></li>
                                    <li class="list-group-item"><?php echo $row['emplacement_logement'] ?></li>
                                    <li class="list-group-item"><?php echo $row['prix_logement'] ?></li>
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
}