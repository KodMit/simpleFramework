Obtenir un l'email de l'utilisateur kodmit : <?= $bundle->getClass('userBundle')->get('email', 'Kodmit'); ?>

Ajouter un utilisateur : <?= //$bundle->getClass('userBundle')->addUser('kodmit', 'password', 'email'); ?>

Verifier si une info utilisateur existe : 
<?php
//if($bundle->getClass('userBundle')->userExist('email', 'test@test.fr')){
//  echo "l'utlisateur avec cet email existe";
//}
?>

Mettre un utilisateur à jours :
<?php //$bundle->getClass('userBundle')->updateUser('kodmit', 'email', 'new_email@test.com'); ?>

Supprimer un utilisateur :
<?php //$bundle->getClass('userBundle')->removeUser('kodmit'); ?>
