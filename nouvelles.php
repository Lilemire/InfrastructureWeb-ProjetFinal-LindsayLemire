<?php include_once('include/header.php');
include_once('controlleurs/nouvelles.php'); ?>

  <!-- Page Content -->
  <div class="container">
  
	<h1 class="my-4">Toutes les nouvelles</h1>
	<!-- Afficher la liste de toutes nouvelles ACTIVES en ordre chronologique (de la plus récente à la plus ancienne) -->
	<!-- L'affichage doit être le même que celui utilisé pour l'affichage des nouvelles par catégorie -->
	<?php
     $controlleursNouvellesActive=new ControlleursNouvellesActive;
     $controlleursNouvellesActive->ControlleursNouvellesActive();
    ?>
  </div>

<?php include_once('include/footer.php'); ?>

</html>

