<?php

include_once('db.inc.php');

if (isset($server)&&isset($host)&&isset($base)&&isset($user)&&isset($pass)) {
    $bdd = new PDO("$server:host=$host;dbname=$base", $user, $pass);
}

if(isset($_POST['atq'])&&isset($_POST['hp'])){
    $sql = 'SELECT * FROM pokemon ORDER BY ATQ '.$_POST['atq'].', HP '.$_POST['hp'];
} else {
    $sql = "SELECT * FROM pokemon";
}

if(isset($_POST['modifiedId'])){
    $sqlModify = "UPDATE pokemon SET nom=?, ATQ=?, HP=? WHERE id=?";
    $modifQuery = $bdd->prepare($sqlModify);
    $modifQuery->execute(array($_POST['newName'],$_POST['newAtq'],$_POST['newHp'],$_POST['modifiedId']));
}


?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pokédex</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container row" style="padding-top: 50px">
            <div class="col-md-6">
                <form method="post">
                    <p>Veuillez affinez vos critères de recherche :</p>
                    <div>
                        <h2>Attaque :</h2>
                        <input type="radio" id="atqASC"
                               name="atq" value="DESC" required>
                        <label for="atqASC">Croissant</label>

                        <input type="radio" id="atqDESC"
                               name="atq" value="ASC" required>
                        <label for="atqDESC">Décroissant</label>

                        <h2>Point de vie :</h2>
                        <input type="radio" id="hpASC"
                               name="hp" value="DESC" required>
                        <label for="hpASC">Croissant</label>

                        <input type="radio" id="hpDESC"
                               name="hp" value="ASC" required>
                        <label for="hpDESC">Décroissant</label>
                    </div>
                        <br>
                    <div>
                        <button class="btn btn-warning" type="submit">Rechercher</button>
                    </div>
                </form>
                <button type="button" class="btn btn-warning modify-btn" style="margin-top: 10px" data-bs-toggle="modal" data-bs-target="#modifyModal" data-type="Nouveau pokémon">Ajouter un pokémon</button>
            </div>
            <div class="col-md-6">
                <h2>Mon pokédex : </h2>
                <br>
                <ul>
                <?php
                foreach($bdd->query($sql) as $poke){
                    echo '<li class="listPoke">
                            <button type="button" class="btn btn-sm btn-warning modify-btn" data-bs-toggle="modal" data-bs-target="#modifyModal" data-type="Modifier" data-id="'.$poke['id'].'" data-name="'.$poke['nom'].'" data-atq="'.$poke['ATQ'].'" data-hp="'.$poke['HP'].'">Modifier</button> 
                            #<span id="idPoke">'.$poke['id'].'</span> 
                            '.$poke['nom'].' | Attaque : '.$poke['ATQ'].' - PDV : '.$poke['HP'].'</li>';
                }
                ?>
                </ul>
            </div>
        </div>
    </body>
    <div class="modal fade" id="modifyModal" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modifyModalLabel">Modifier pokémon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="mb-3 row">
                            <label for="formId" class="col-sm-3 col-form-label">Identifiant</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" name="modifiedId" id="formId">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="formName" class="col-sm-3 col-form-label">Nom</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="formName" name="newName" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="formAtq" class="col-sm-3 col-form-label">Attaque</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="formAtq" min="0" name="newAtq" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="formPdv" class="col-sm-3 col-form-label">Point de vie</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="formPdv" min="0" name="newHp" required>
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Modifer">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button><!--
                    <button type="button" class="btn btn-primary">Modifier</button>-->
                </div>
            </div>
        </div>
    </div>
    <script>
        const pokeModal = document.getElementById('modifyModal');
        pokeModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            const button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            const type = button.getAttribute('data-type');
            const name = button.getAttribute('data-name');

            const modalTitle = pokeModal.querySelector('.modal-title');
            const modalId = pokeModal.querySelector('.modal-body #formId');
            const modalName = pokeModal.querySelector('.modal-body #formName');
            const modalAtq = pokeModal.querySelector('.modal-body #formAtq');
            const modalHp = pokeModal.querySelector('.modal-body #formPdv');

            if(name==null){
                modalTitle.textContent = type
                //modalId.parentNode.parentNode.parentNode.removeChild(modalId.parentNode.parentNode)
                //TODO: lorsque qu'on clique sur ajouter ca supprime mais ca rajoute pas quand on clique sur modifer après
            } else {
                modalTitle.textContent = type + " " + name
            }
            modalId.value = button.getAttribute('data-id')
            modalName.value = name;
            modalAtq.value = button.getAttribute('data-atq')
            modalHp.value = button.getAttribute('data-hp')
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>