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
</head>
<style>
.site{margin-left:300px;}
.listeObjet img{width:300px;}
</style>
<body>

<?php require_once('require_once/db.php') ?>
<?php require_once("require_once/menu.php") ?>
<?php require_once("require_once/menu_left.php") ?>
    
<div id="sideButton">
    <button src="js/webvp.js" onclick="openNav()" href="javascript:void(0);"><i class="fas fa-bars"></i></button>	
</div> 

<div class="site">
    <div class="wrapper objet">
    <?php if (isset($_GET['id'])) {
    $req = $pdo->query('select * from categorie where id = '.$_GET['id'])->fetch(); 
    ?>
    <h1><?= $req['nom']; ?></h1>
    <h3>Articles en vente</h3>
    <div class="listeObjet">
        <table>
            <?php 
            $idobjets = $pdo->query('select * from objet where id_categorie = "'.$req['id'].'"')->fetchAll();
            foreach ($idobjets as $idobjet) {
            $articles = $pdo->query('select * from article where id_objet = '.$idobjet['id'])->fetchAll();
            foreach ($articles as $article) {
            if(($article['etat']="Neuf")||($article['etat']="Reconditionné")||($article['etat']="D'occasion"))  {                  
            ?> 
            <tr>
                <td><img src="images/article/<?= $article['id']; ?>.jpg" alt=""></td>
                <td><strong><?= $article['nomArticle']; ?></strong></td>
                <td><?= $article['description']; ?></td>
                <td><strong><?= $article['prix']; ?>€</strong></td>
                <td><?= $article['lieu']; ?></td>
                <td><a href="article.php?id=<?= $article['id'] ?>">Voir</a></td>
            </tr>
            <?php
                }
                }
            }
            ?>
        </table>
    </div>
        <?php } else { ?>
    <h1>Tous les objets</h1>
    <h3>Articles en vente</h3>
    <div class="listeObjet">
            <table>
        <?php 
            $articles = $pdo->query('select * from article order by id desc')->fetchAll();
            foreach ($articles as $article) {                    
                $categ = $pdo->query('select * from objet where id = '.$article['id_objet'])->fetch();
                ?> 
                <tr>
                    <td><img src="images/article/<?= $categ['id']; ?>.jpg" alt=""/></td>
                    <td><strong><?= $article['nomArticle']; ?></strong></td>
                    <td><?= $article['description']; ?></td>
                    <td><strong><?= $article['prix']; ?>€</strong></td>
                    <td><?= $article['lieu']; ?></td>
                    <td><a href="article.php?id=<?= $article['id'] ?>">Voir</a></td>
                </tr>
        <?php } ?>
            </table>
    </div>
<?php } ?>
    </div>

</div>

</body>
</html>