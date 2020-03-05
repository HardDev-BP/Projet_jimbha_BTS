<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta HTTP-EQUIV="pragma" content="no-cache">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/menu_left.css">
	<link rel="stylesheet" href="css/images_grid.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script type="text/javascript" src="js/webvp.js"></script>
	<script type="text/javascript" src="js/recherche.js"></script>
	<title>Jimbha</title>
</head>
<body>
	
<?php require_once('require_once/db.php') ?>
<?php require_once("require_once/menu.php") ?>
<?php require_once("require_once/menu_left.php") ?>


<div id="sideButton">
        <span class="ml-3" src="js/webvp.js" onclick="openNav()" href="javascript:void(0);"><i class="fas fa-bars" style="margin: 8px;"></i>Menu</span>
</div> <!--Fin div id="sideButton"-->

<div id="content">
        <table>
                <tr><a href=""><img src="images/logo homepage2.png"></a></tr>
                <tr><button><a href="">Commence à vendre</a></button></tr>
        </table>
</div> <!--Fin div id="content"-->
<!-- <div id="laterale"></div> --> <!--Fin div id="laterale"-->

<div id="sales_pictures">
<?php 
       //Requête select sur la base de donnée afin d'aller chercher les données de la table objetvente trié par id limité à 20 ligne
       $req = $pdo->query('select * from article order by id desc limit 20')->fetchAll();
       //boucle pour chaque requête sur les lignes
       foreach ($req as $row) {
      // Si les l'état des lignes n'est pas null (en vente), on entre dans la boucle
       if ($row['etat']) {
       ?> 
               <div class="column">
                   <a href="article.php?id=<?= $row['id']; ?>"><img src="images/article/<?= $row['id']; ?>.jpg"></a>
                       <div class="detail">                                
                           <span class="idArticle"><b><?= $row['id']; ?></b>&nbsp</span>
                           <span class="marque"><?= $row['marque']; ?></span>
                           <span class="nomArticle"><?= $row['nomArticle']; ?></span><br> 
                           <span class="description"><?= $row['description']; ?></span><br> 
                           <span class="prix"><b><?= $row['prix']; ?>&nbsp€</b></span><br>
                           <span class="lieu"><?= $row['lieu']; ?></span><br>
                           <span class="etat"><b><?= $row['etat']; ?></b></span><br>
                       </div>

               </div> 
       <?php
               }
               }
                ?>
        </div> 
<footer>

</footer>

</body>
</html>