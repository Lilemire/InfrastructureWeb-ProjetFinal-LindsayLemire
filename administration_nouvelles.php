<?php include_once('include/header.php'); ?>

  <!-- Page Content -->
  <div class="container">

  <?php
 	 if(isset($_SESSION["utilisateur"])) {
	?>
  
	<h1 class="my-4">Administration - Nouvelles</h1>

	<p><b>En construction. On présume que cette partie serait réalisée dans une phase ultérieure.</b></p> 

	Il doit cependant être impossible d'accéder à cette page sans être préalablement connecté. 
	Si un utilisateur non connecté essaie d'accéder à la page, un message d'erreur doit s'afficher
	
	<?php
		} else {
	?>
		<h1 class="my-4">Vous n'êtes pas autorisé à voir cette page</h1>
		<p>
			<a href="index.php">Retour à la page d'accueil</a>
		</p>
	</div>
	<?php
	} ?>



<?php include_once('include/footer.php'); ?>