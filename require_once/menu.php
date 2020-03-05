<div id="menu">
	<ul>
		<li><a href="index.php"><span class="logo"><span class="titre_jim">Jim</span><span class="titre_bha">bha</span><br>Site de vente informatique<br><span class="titre_particulier">entre particulier</span></span></a></li>
		<li><a href="vendre.php">Vends un objet</a></li>
		<li>
			<button id="rechercher" onclick="a()"><i class="fas fa-search"></i></button>
			<div id="box">
				<ul>
					<input type="" name="" placeholder="Rechercher">
				</ul>
			</div> 
		</li>
                <?php if (!isset($_SESSION['id'])) { ?>
		<li><a href=""><button id="aide">S'inscrire</button></a></li>
		<li><a href="connexion.php"><button>Se connecter</button></a></li> 
                <?php } else { ?>
                <li><a href=""></a></li>
		<li><a href="deconnexion.php">Déconnexion</a></li>
                <?php } ?>
		<li ><button><a href="">?</a></button></li>
		<li>
			<a href="">FR</a>
			<ul>
				<li><a href="">Français</a></li>
				<li><a href="">Anglais</a></li>
				<li><a href="">Espagnol</a></li>
				<li><a href="">Allemand</a></li>
			</ul>
		</li>
	</ul>
		</div> <!--Fin de div class="menu"-->