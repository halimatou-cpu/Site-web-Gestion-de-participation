<?php

require("auth/EtreAuthentifie.php");

$title = 'Accueil';
include("header.php");
if($idm->getRole()=="admin")
	{
?>

<div class="nav-side-menu">
    <div class="brand">Gestion de Participations</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
	<div class="menu-list">
            <ul id="menu-content" class="menu-content collapse in">
				<li><a href="session.php"><i class="glyphicon glyphicon-home"></i> Accueil</a></li>
                <li  data-toggle="collapse" data-target="#users" class="collapsed">
                  <a href="#"><i class="fas fa-book-open"></i> Gestion des utilisateurs <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="users">
     <li><a  href="user_list.php" title="Liste des utilisateurs">Liste des utilisateurs</a></li>
     <li> <a  href="adduser_form.php" title="Ajout User">Ajouter un utilisateur</a></li>
     <li> <a  href="supp_uti.php" title="Suppression">Supprimer un utilisateur</a></li>
    <li> <a  href="mod_uti.php" title="Modifier le mot de passe">Modifier le mot de passe</a></li>
                </ul>
				<li  data-toggle="collapse" data-target="#identifications" class="collapsed">
				                   <a href="#"><i class="fas fa-address-card"></i>Gestion des types d'identification <span class="arrow"></span></a>
				                 </li>
				                 <ul class="sub-menu collapse" id="identifications">
				               <li><a  href="liste_id.php" title="liste_id">Liste des types d'identification</a></li>
				     <li>   <a  href="ajout_id.php" title="Ajout_id">Ajouter un moyen d'identification</a></li>
				     <li><a  href="supp_id.php" title="mod_mdp">Supprimer un moyen d'identification</a></li>

				     <li>  <a   href="modif_identif.php" title="association_prof">Modifier un moyen d'identification</a></li>

				               </ul>
				                   <li  data-toggle="collapse" data-target="#groupes" class="collapsed">
				                   <a href="#"><i class="fa fa-users fa-lg"></i>Gestion des personnes et identifiants<span class="arrow"></span></a>
				                 </li>
				                 <ul class="sub-menu collapse" id="groupes">

				                 <li><a  href="liste_per.php" title="liste_groupe">Liste des personnes</a></li>

				                 <li>  <a href="events_types.php" title="ajout_groupe">Inscription à un événement</a></li>

				                 <li> <a  href="mod_per.php" title="modify_groupe">Modification informations personne </a></li>

				                 <li>    <a  href="liste_id_per.php" title="delete_groupe">Liste des personnes et leurs identifiants</a></li>

				                  <li>    <a  href="ajout_id_per.php" title="delete_groupe">Ajouter des identifiants à une personne</a></li>

				                   <li>    <a  href="mod_id_per.php" title="delete_groupe">Modifier les identifiants d'une personne</a></li>

				                     <li>    <a  href="supp_id_per.php" title="delete_groupe">Supprimer les identifiants d'une personne</a></li>

				             </ul>

				                   <li  data-toggle="collapse" data-target="#tableau" class="collapsed">
				                   <a href="#"><i class="glyphicon glyphicon-tasks"></i> Tableau de bord<span class="arrow"></span></a>
				                 </li>

				                 <ul class="sub-menu collapse" id="tableau">

				               <li><a href="liste_boutons_events.php" title="participants">Liste des participants aux évènements</a></li>

								<li><a href="liste_inscrit.php">Affichage des inscrits qui n'ont pas participé</a></li>
				  				<li><a href="liste_evenements.php">Affichage des événements et des personnes inscrites qui n'y ont pas participé</a></li>

				                </li>
				             </ul>

				                   <li>
				                   <a href="<?php echo $pathFor['logout'] ?>">
				                   <i class="fas fa-sign-out-alt"></i> Déconnexion </a>
				                   </li>

				                 </ul>

				                   
								</ul>
				      </div>

				 </div>

				 <?php
				 	}
				 	else
				 	{
				 ?>

				 
				 		<div class="wrapper">
				 	<nav class="navigation">
				 	  <ul>
				 	  	<li>
				 	      <a href="session.php">Accueil</a>
				 	    </li>
				 	    <li>
				 	      <a href="event_ferme.php">événement fermé</a>
				 	    </li>
				 	    <li>
				 	      <a href="event_ouvert.php">événement ouvert</a>
				 	    </li>
				 	    <li>
				 	      <a href="liste_event.php">Liste des inscrits par événement</a>
				 	    </li>
				 	    <li>
				 	      <a href="liste_par_event.php">Liste des participants par événement</a>
				 	    </li>
				 	   <li class="last">
				 	      <a href="<?= $pathFor['logout'] ?>"><span class="glyphicon glyphicon-share"></span> Déconnexion</a>
				 	    </li>
				 	  </ul>
				 	</nav>
				 	</div>

				 <?php
				 	}
				 	include("footer.php");
				 ?>
