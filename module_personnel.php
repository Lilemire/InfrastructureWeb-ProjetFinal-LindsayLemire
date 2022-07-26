<?php 
  include_once('include/header.php'); 
  require_once 'controlleurs/personnels.php';
?>


  <!-- Page Content -->
  <div class="container">
  
	<h1 class="my-4">Module personnel</h1>	
	<p>La requête affiche la liste des rendez-vous avec le prenom et le nom du client</p>
	
	<!-- Affichez les enregistrement de la table que vous avez ajoutée à la base de données. -->

  <?php
  $controlleursPersonnels=new ControlleursPersonnels;
  $controlleursPersonnels->afficherTableauPersonnels();
  ?>
	
  </div>

<?php include_once('include/footer.php'); ?>
