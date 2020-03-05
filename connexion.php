

<!DOCTYPE html>
<html lang="fr">
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
	<title>Connexion</title>	
</head>
<style>
    .wrapper_article{width:50%; height:50%; margin-left:150px; margin-top:120px;z-index:1;position:relative}
    table{width:400px;}
    td{width:100px;}
</style>
<body>

<?php    
    require_once('require_once/db.php');
    require_once("require_once/menu.php"); 
    require_once("require_once/menu_left.php");
    require_once("require_once/sideButton.php");
?>

<div class="wrapper_article">
<h1>Connexion</h1>

<form method="post" action="connexion.php">
        <table>
                <tr>
                        <td>Identifiant : </td>
                        <td><input type="text" name="login"></td>
                </tr>
                <tr>
                        <td>Mot de passe : </td>
                        <td><input type="password" name="mdp"></td>
                </tr>
                <tr>
                        <td></td>
                        <td><input type="submit" name="envoi" value="Se connecter"></td>
                </tr>
                <tr>
                        <td>Pas de compte ?</td>
                        <td><a href="inscription.php">S'inscrire</a></td>
                </tr>
        </table>
</form>

<?php 

if (!empty($_POST['login']) AND !empty($_POST['mdp'])) {
    require('require_once/db.php');
    $req = $pdo->query('select * from membre where pseudo = "'.$_POST['login'].'" and mdp = "'.$_POST['mdp'].'"')->fetch(); 
        if ($req) {
                session_start();
                $_SESSION['id'] = $req['id'];
                $_SESSION['login'] = $req['pseudo'];
                $_SESSION['statut'] = $req['statut'];              
                //var_dump($_SESSION);
                header("Location: index.php");
 ?>
<?php
} else {
        echo "<p>Mauvais identifiant ou mot de passe.</p>";
}
} ?>
</div>


</body>
</html>
