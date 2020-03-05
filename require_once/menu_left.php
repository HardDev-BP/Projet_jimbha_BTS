<?php //require_once('require_once/db.php') ?>
<div id="menu_left">
<table>
<ul>
    <li><a href="categorie.php"> Categorie d'objet </a></li>
    <?php 
        $req = $pdo->query('select * from categorie order by nom')->fetchAll();
        foreach ($req as $row) {
            echo "<li><a href=\"categorie.php?id=".$row['id']."\"> ".$row['nom']."</a></li>";
        }
    ?>
</ul>
</table>
	<button src="js/webvp.js" href="javascript:void(0);" onclick="closeNav()">CLOSE</button>
</div> <!--Fin div id="menu_left"-->
