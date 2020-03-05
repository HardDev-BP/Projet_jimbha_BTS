<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Jimbha</title>
        <meta charset="UTF-8">
        <meta HTTP-EQUIV="pragma" content="no-cache">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/menu_left.css">
        <link rel="stylesheet" href="css/images_grid.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script type="text/javascript" src="js/webvp.js"></script>
    <script type="text/javascript" src="js/recherche.js"></script>
	
</head>


<style>
    .site{margin-left:300px; margin-top:300px;}
    .wrapper_article{width:50%; height:50%; margin-left:150px; margin-top:-120px;z-index:1;position:absolute}
    .wrapper_article h2{font:10px;color:orangered}
    .wrapper2{display:flex}
    .detail{margin-left:30px; width:300px}
    .commentaire{z-index:2;position:absolute; margin-left:620px; margin-top:-50px}
    #ajoutpanier {display: inline-block ;margin-bottom: 15px ;border: 1px solid gray;padding: 5px 15px;font-weight: bold;background:bisque;cursor: pointer;transition-duration: 0.2s;position: relative;top: 9px;}
    #ajoutpanier:hover {background: rgba(231, 76, 60,0.7);color: #ecf0f1;transition-duration: 0.2s;}
</style>


<body>
    

    
<?php 
    require_once('require_once/db.php');
    require_once("require_once/menu.php"); 
    require_once("require_once/menu_left.php");
    require_once("require_once/sideButton.php");
?>
<div class="site">
<div class="wrapper_article">
    <?php if(isset($_GET['id'])){
     $article=$pdo->query('Select * from article where id='.$_GET['id'])->fetch();
     $nomCateg=$pdo->query('select c.nom from categorie c 
                            inner join objet o on c.id=o.id_categorie
                            inner join article a on o.id=a.id_objet
                            inner join membre m on a.id_membre=m.id
                            where a.id='.$_GET['id'])
                            ->fetch();
     $pseudoMembre=$pdo->query('SELECT m.pseudo FROM article as a 
                            inner join membre as m 
                            on a.id_membre=m.id
                            where a.id='.$_GET['id'])
                            ->fetch();
    }
    ?>
    <div class='wrapper1'>
        <h1><?=$article['nomArticle']; ?></h1>
        <a href="">Voir tous les articles en vente pour cet objet</a>
        <h2><a href=""><?= $nomCateg['nom']; ?></a></h2>
    </div>
    <div class='wrapper2'>
        <img width=300 height=250 src="images/article/<?= $article['id']; ?>.jpg">
        <div class='detail'>            
            <strong>Description :</strong><br><?= $article['description'] ?> <br><br>
            <strong>Prix :</strong> <?= $article['prix'] ?> € <br><br>
            <strong>Lieu :</strong> <?= $article['lieu'] ?> <br><br>
            <strong>Vendu par :</strong> <a href=""><?= $pseudoMembre['pseudo'] ?></a> <br><br><br>
            <p>           
            <?php if (!empty($_SESSION['id'])) { 
                if(($article['etat']="Neuf")||($article['etat']="Reconditionné")||($article['etat']="D'occasion")) {
                    $req = $pdo->query('select * from panier as p inner join concerner as c on p.id=c.id_panier where p.id_membre= '
                            .$_SESSION['id'].' and c.id_article = '.$_GET['id'])->fetch();
                     $Vendeur = $pdo->query('select * from article where id = '.$_GET['id'])->fetch();
                     if ($Vendeur['id_membre'] != $_SESSION['id']) { //si c'est un acheteur
                        if (!$req) { 
            ?>
                            <a id="ajoutpanier">Ajouter au panier</a> 
                <?php } else { ?>
                            <a id="ajoutpanier">Article ajouté</a> 
                <?php } 
                        }
                    // Sinon, si l'état des objets en vente est considéré comme vendu, on entre dans la condition 
                    } else { ?> <a id="ajoutpanier">Déjà vendu</a> <?php }

                } else { ?>
                        <a href="connexion.php">Connectez-vous pour acheter cet article</a>				
             <?php } ?>
            </p>
        </div>
        <div class="commentaire">
            <h2>Commentaires</h2>
            <h3>Posez vos questions au vendeur !</h3>
            <?php //if (isset($_SESSION['id'])) { ?>
            <form action="article.php?id=<?= $_GET['id']; ?>" method="post">
                <textarea name="com" cols="50" rows="5"></textarea><br>
                <input type="submit" value="Envoyer" name="envoi">
            </form>
        </div>
        
    </div>    
</div>
</body>