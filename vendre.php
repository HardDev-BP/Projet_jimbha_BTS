<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Jimnbha</title>

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/menu_left.css">
    <link rel="stylesheet" href="css/images_grid.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" src="js/webvp.js"></script>
    <script type="text/javascript" src="js/recherche.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<style>

</style>
<body>
<?php 
	require_once('require_once/db.php');
	require_once("require_once/menu.php");
	require_once("require_once/menu_left.php"); 
	require_once("require_once/sideButton.php");
?>


	<div class="site" id="contentVendre">

	<div class="wrapper vendre" > 
        <!-- S'il y a une session ouverte -->
        <?php if (isset($_SESSION['id'])) { ?>
            <!-- Bannière de la page -->
            <div class="jumbotron mt-1 mr-5" style="background:url('images/ecommerce.jpg');background-repeat: no-repeat;background-size: 961px 220px;">
                <div class="text-center " style="margin-top: -70px; margin-bottom: 112px;">
                    <h1 class="display-4 pr-4 mb-3 text-white">Mettre un objet en vente</h1>
                </div>
                <p class="text-center align-text-bottom text-white font-weight-bolder">Commencez par trouver l'objet que vous voulez vendre dans notre base de données.</p>
                
             </div>

            <!-- Formulaires à remplir -->
			<p><form action="vendre.php" method="post">
			<table class="align-middle" style="margin-left: 18em;">
				<tr>
					<td>Objet : </td>
					<td><select name="objet" id="objet">
				<?php 
                    // Requête PHP pour lister les objets
					$req = $pdo->query('select * from objet order by nom')->fetchAll();

					foreach ($req as $row) {
						echo "<option value=\"".$row['id']."\">".$row['nom']."</option>";
					}

				?>
			</select></td>
                </tr>
                <tr>
					<td>Nom de l'article : </td>
					<td><input type="text" name="nomArticle"></td>
				</tr>
				<tr>
					<td>Description : </td>
					<td><input type="text" name="description"></td>
                </tr>
                <tr>
					<td>Marque de l'article : </td>
					<td><input type="text" name="marque"></td>
                </tr>
                <tr>
                <td>Etat : </td>
                <td><select name="etat" id="etat">
                <option value="Neuf" >Neuf</option> 
                <option value="Reconditionné" >Reconditionné</option>
                <option value="D'occasion" selected>D'occasion</option>
                </select></td>
                </tr>
				<tr>
					<td>Prix : </td>
					<td><input type="text" name="prix"> €</td>
				</tr>
				<tr>
					<td>Lieu : </td>
					<td><input type="text" placeholder="Ville" name="lieu"></td>
				</tr>
				
				<tr>
					<td></td>
					<td><input type="submit" value="Valider" name="envoi" class="envoi"></td>
				</tr>
			</table>
		</form></p>

		<?php
                // Condition d'envoi avec isset(si la variable existe) et !empty(different de null)
			if (isset($_POST['envoi']) AND 
                isset($_POST['objet']) AND !empty($_POST['objet']) AND 
                isset($_POST['nomArticle']) AND !empty($_POST['nomArticle']) AND
				isset($_POST['description']) AND !empty($_POST['description']) AND 
                isset($_POST['lieu']) AND !empty($_POST['lieu']) AND
                isset($_POST['marque']) AND !empty($_POST['marque']) AND 
				isset($_POST['prix']) AND !empty($_POST['prix'])
				) {
					
                    // requête SQL avec insert into et values
                $pdo->exec('insert into article(nomArticle, description, prix, lieu, etat, marque, id_objet, id_membre) 
                
                values("'.$_POST['nomArticle'].'","'.$_POST['description'].'",'.$_POST['prix'].',"'.$_POST['lieu'].'","'.$_POST['etat'].'","'.$_POST['marque'].'",'.$_POST['objet'].','.$_SESSION['id'].')');

				echo "<p class=\"text-center pt-5\">Objet mis en vente ! <a href=\"moncompte.php\">Voir vos objets en vente</a></p>";
					
			} elseif (isset($_POST['envoi'])) {
				echo "erreur";
			}


		 } else { ?>

		<p>Vous n'êtes pas connecté(e). <a href="connexion.php">Se connecter</a><br>
			Pas de compte ? <a href="inscription.php">Inscrivez-vous</a></p>

		<?php } ?>

	</div>

	</div>


</body>
</html>