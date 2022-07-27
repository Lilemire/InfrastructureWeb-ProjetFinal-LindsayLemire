<?php include_once('include/header.php'); 
include_once('controlleurs/personnels.php');?>


<?php
  if(isset($_SESSION["utilisateur"])) {
    ?>

  <!-- Page Content -->
  <div class="container">

  
  
	<h1 class="my-4">Administration - Module personnel</h1>
	
	<!-- Cette section doit permettre de gérer (lister, ajouter, modifier et supprimer) des enregistrement d'une table que vous avez ajoutée à la base de données. -->
	<!-- Vous pouvez réaliser cette demande en utilisant plusieurs pages php (une pour l'ajout, une pour l'édition et une pour la suppression) ou utiliser des composants dialog ou Modals -->
	<!-- Il doit être impossible d'accéder à cette page sans être préalablement connecté. Si un utilisateur non connecté essaie d'accéder à la page, un message d'erreur doit s'afficher -->
	<?php
    $controlleurNouvelles=new ControlleursPersonnels;
    $controlleurNouvelles->afficherListeAdministrationPersonnels();
    ?>

	<a href="ajout_personnel.php" class="btn btn-primary" aria-label="Ajouter">Ajouter</a>
	
  </div>

  <?php
    } else {
  ?>
    <h1 class="my-4">Vous n'êtes pas autorisé à voir cette page</h1>
    <p>
      <a href="index.php">Retour à la page d'accueil</a>
    </p>
    <?php
    } ?>

<?php include_once('include/footer.php'); ?>