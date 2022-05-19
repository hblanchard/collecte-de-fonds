<?php 
	//Inclusion du back SQL
	include 'db.php'; 
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Collecte de fonds</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	
	<header>
		<h1>Collecte de fonds</h1>
		<p>Objectif <?php echo $valueToReach; ?>€</p>
	</header>
	
	<section class="input-level-1">
		<section class="input-level-2-left">
			<form class="input-level-3" action="index.php" method="POST">
				<input id="amount" class="amount" name="amount" type="text" placeholder="Nouveau montant..." required>
			</form>
			<p>€</p>
		</section>
		
		<section class="input-level-2-right">
			<img src="Icons/enter.png" alt="Appuyez sur Entrer pour valider" width="27px">
			<p>Entrer</p>
		</section>
	</section>
	
	
	<section class="progress-level-1">
		<section class="progress-level-2-top">
			
			<!--Valeur dynamique : pourcentage -->
			<p class="percentage"><?php $percentage = ($currentValue/$valueToReach)*100; echo intval($percentage);?> %</p>
			
			<!--Valeur dynamique : avancement de la barre de progression -->
			<progress id="progress" max="3000" value="<?php echo $currentValue; ?>"></progress>
			<img src="Icons/golf.png" alt="Drapeau de golf" width="15px" height="15px">
		</section>
		<section class="progress-level-2-bottom">
			
			<!--Valeur dynamique : margin-left varie entre 0px et 420px -->
			<p style="margin-left:<?php if($percentage <= 100){echo intval((420/100)*$percentage);} else{echo '390';}?>px"><?php echo $currentValue;?>€</p>
			
		</section>
	</section>
	
	<section class="transactions-level-1">
		<h2>Historique des transactions</h2>
		
		<!-- Modèle pour l'affichage des transactions -->
		<!--
		<section class="model-transaction">
			<hr>
			<section class="model-infos-transaction">
				<p>Date</p>
				<p>Montant</p>
			</section>
		</section>
-->
		
		<!-- Affichage en boucle du modèle séparateur, date, montant et style css -->
		<?php
		
			foreach ($resultDateAmount as $resultDateAmount)
			{ 
				echo '<section class="model-transaction">
					<hr>
					<section class="model-infos-transaction">
						<p>'.$resultDateAmount['date'].'</p>
						<p>'.$resultDateAmount['amount'].' €</p>
					</section>
				</section>';

			}
		
		?>
		
	</section>
	
</body>
</html>

<?php 
//Déconnexion de la bdd
$cnx = NULL;
?>
