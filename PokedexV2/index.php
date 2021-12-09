<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TP_NOTE</title>
    <link rel="stylesheet" href="pokedex.css">
</head>
<body>
	<div class="pokedex">
		<div class="pan_right"> </div>
		<div class="pan_screen"> 

		<?php
		include_once("db.inc.php");
		include_once("pokemon.class.php");

		if(isset($_POST['modif'])) {
            try {
                $bdd = new PDO("mysql:host=localhost;dbname=$db_name", $user, $pass);

                if(isset($_POST['pokeId']) && $_POST['stat'] != "EMPTY" && isset($_POST['newStatValue']))
                {
                    $sql = "UPDATE pokedex SET ".$_POST['stat']." = '".$_POST['newStatValue']."' WHERE id = ".$_POST['pokeId'];
                    $bdd->exec($sql);
                }
            }
            catch(PDOExeption $err)
            {
                echo "Erreur : " . $e->getMessage() . "<br />";
                die();
            }
		}
		
		if(isset($_POST['tri']))
		{
			try
			{
				$bdd = new PDO("mysql:host=localhost;dbname=$db_name",$user,$pass);
				$sql = "SELECT * FROM `pokedex` WHERE 1" ;
				$arguments = array();
				if($_POST['type0'] != "EMPTY")
				{
					$sql .= " AND types0nom = ?";
					array_push($arguments, $_POST['type0']);
				}

                if($_POST['cond'] != "EMPTY" && $_POST['operator'] != "EMPTY" && $_POST['MinMaxValue'] != null)
                {
                    $sql .= " AND ".$_POST['cond']." ".$_POST['operator']." ".$_POST['MinMaxValue'];
                }

                if($_POST['orderBy'] != "EMPTY" && $_POST['orderType'] != null){
                    $sql .= " ORDER BY ".$_POST['orderBy']." ".$_POST['orderType'];
                }

				
				$reponse = $bdd->prepare($sql);

				if(is_object($reponse))
				{
					$reponse->execute($arguments);
					$tmp = $reponse->fetchAll();
					foreach ($tmp as $ligne) 
					{
						$tmp = new Pokemon($ligne['id'],$ligne['nom'],$ligne['types0nom'],$ligne['types0couleur'],$ligne['types1nom'],$ligne['types1couleur'],$ligne['baseHP']	,$ligne['baseAttack'],$ligne['baseDefense'],$ligne['baseSpAttack'],$ligne['baseSpDefense'],$ligne['baseSpeed'],$ligne['description'],$ligne['image']);	
						echo $tmp->printHTML();
					}
				}
				

			}
			catch(PDOExeption $err)
			{
				echo "Erreur : " . $e->getMessage() . "<br />";
				die();
			}
		}
		
		

		?>
			
		</div>
		<div class="pan_left"> 
			<div>
				<p class="cadre" id="cadre">
					Prénom : Lenny</br>
					Nom :  Louis</br>
					numéro étudiant : i205379 </br>
				</p>
			</div>
			<div>
				<form method="post" class=cadre>
					Rechercher :<br>
					Type 0 : <select name="type0">
						<option value="EMPTY">---</option>
						<option value="Combat">Combat</option>
						<option value="Dragon">Dragon</option>
						<option value="Eau">Eau</option>
						<option value="Electrique">Electrique</option>
						<option value="Fée">Fée</option>
						<option value="Feu">Feu</option>
						<option value="Glace">Glace</option>
						<option value="Insecte">Insecte</option>
						<option value="Normal">Normal</option>
						<option value="Plante">Plante</option>
						<option value="Poison">Poison</option>
						<option value="Psy">Psy</option>
						<option value="Roche">Roche</option>
						<option value="Sol">Sol</option>
						<option value="Spectre">Spectre</option>
					</select>
					Type 1 : <select name="type1">
						<option value="EMPTY">---</option>
						<option value="Acier">Acier</option>
						<option value="Combat">Combat</option>
						<option value="Eau">Eau</option>
						<option value="Fée">Fée</option>
						<option value="Glace">Glace</option>
						<option value="Plante">Plante</option>
						<option value="Poison">Poison</option>
						<option value="Psy">Psy</option>
						<option value="Roche">Roche</option>
						<option value="Sol">Sol</option>
						<option value="Vol">Vol</option>
					</select><br>
					Condition : <select name="cond">
						<option value="EMPTY">---</option>
						<option value="id">ID</option>
						<option value="baseHP">HP</option>
						<option value="baseAttack">ATQ</option>
						<option value="baseDefense">DEF</option>
						<option value="baseSpAttack">SP_ATQ</option>
						<option value="baseSpDefense">SP_DEF</option>
						<option value="baseSpeed">SPEED</option>
					</select> 
					<select name="operator">
						<option value="EMPTY">---</option>
						<option value=" = ">=</option>
						<option value=" > ">></option>
						<option value=" >= ">>=</option>
						<option value=" < "><</option>
						<option value=" <= "><=</option>
					</select>
                    <input type="number" name="MinMaxValue" min="0" max="300"><br>
                    Trier par : <select name="orderBy">
                        <option value="EMPTY">---</option>
                        <option value="id">ID</option>
                        <option value="baseHP">HP</option>
                        <option value="baseAttack">ATQ</option>
                        <option value="baseDefense">DEF</option>
                        <option value="baseSpAttack">SP_ATQ</option>
                        <option value="baseSpDefense">SP_DEF</option>
                        <option value="baseSpeed">SPEED</option>
                    </select><br>
                    <input type="radio" id="asc" name="orderType" value="ASC">
                    <label for="asc">Croissant</label>
                    <input type="radio" id="desc" name="orderType" value="DESC">
                    <label for="desc">Decroissant</label><br>
					<input class="btn" type="submit" name="tri" value="Afficher les résultats">
				</form>

                <form method="post" class="cadre">
                    Modifier une stat :<br>
                    ID du pokémon : <input type="number" name="pokeId" min="0"><br>
                    Stat : <select name="stat">
                        <option value="EMPTY">---</option>
                        <option value="id">ID</option>
                        <option value="baseHP">HP</option>
                        <option value="baseAttack">ATQ</option>
                        <option value="baseDefense">DEF</option>
                        <option value="baseSpAttack">SP_ATQ</option>
                        <option value="baseSpDefense">SP_DEF</option>
                        <option value="baseSpeed">SPEED</option>
                    </select><br>
                    Nouvelle Valeur : <input type="number" name="newStatValue" min="0"><br>
                    <input class="btn" type="submit" name="modif" value="Modifier">
                </form>
			</div>
			
			
		</div>
		

		<div class="pan_center"></div>
	</div> 
</body>
<script>
    document.getElementById("cadre").innerText += "Groupe : 22C"
</script>
</html>