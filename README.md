# simpleFramework
Self-made PHP framework with bundles and route system 

## Les routes
Pour créer une nouvelle route, editez le fichier `routes.json` et ajoutez votre route.

### Exemple

``` json
{
  "index": {
      "link": "",
      "file": "home.php"
    },
    "login": {
      "link": "login",
      "file": "login.php"
    }
 }
```

``Link`` est le lien et ``file`` le fichier de template dans le repertoire ``templates``.

Ainsi quand vous entrerez ``http://votresite.com/lien`` vous accèderez au fichier php renseigné dans le fichier Json.


## Ajouter un bundle

Un bundle est un module qui vous permet d'ajouter des fonctionnalités au framework, à l'heure actuelle deux bundles sont fournis avec, le bundle ``Database`` pour la connexion à la base de données SQL et le bundle ``User`` pour le système d'utilisateurs.

Pour ajouter un bundle le principe est similaire à celui des routes, ouvrez le fichier ``bundles.json``.

### Exemple

bundles.json

``` json
{
    "userBundle": {
      "class": "User",
      "file": "user.php"
    },
    "exampleBundle": {
      "class": "Example",
      "file": "example.php"
    }
 }
 ```
 
 La ligne class est le nom de la classe dans votre fichier PHP, et la ligne file le nom de votre fichier PHP.
 
 Exemple de bundle
 
 ``` php
/**
* Example bundle
*/
class Example
{
	
	function __construct()
	{
		# code...
	} 
 
 ```
 
## Utiliser un bundle
 
 Il existe plusieurs façons d'utiliser votre bundle, une fois déclaré dans le fichier Json il est automatiquement déclaré sur toute les pages du template et donc utilisable sans rajouter la moindre ligne de code.
 
 Pour utiliser un bundle vous devrez utiliser la variable ``$bundle``, c'est toujours la même.
 
 Vous pouvez l'appeller de plusieurs manières, nous allons prendre l'userBundle comme exemple :
 
 ``` php
 $user = $bundle->getClass('userBundle');
 $user->addUser('Kodmit', 'Password', 'email@email.com');
 ```
 
 Ou encore plus simple :
 
  ``` php
  $bundle->getClass('userBundle')->addUser('Kodmit', 'Password', 'email@email.com');
  ```
 
 La méthode ``getClass(NomDeVotreClasse)`` permet comme vous pouvez le constater d'appeller la classe de votre bundle pour ainsi y effectuer des actions.
 
## Passer en prod
 
 Pour passer votre fichier en prod ouvrez le fichier ``config.php`` et changez la variable ``$devMode`` à ``false``.
 
 
 Il manque surement beaucoup de choses à dire, ce framework me sert essentiellement à gagner du temps dans mes projets professionnels et personnels, je serais très souvent amené à l'améliorer.
 
## UserBundle

```
Obtenir un l'email de l'utilisateur kodmit : <?= $bundle->getClass('userBundle')->get('email', 'Kodmit'); ?>

Ajouter un utilisateur : <?= $bundle->getClass('userBundle')->addUser('kodmit', 'password', 'email'); ?>

Verifier si une info utilisateur existe : 
<?php
if($bundle->getClass('userBundle')->userExist('email', 'test@test.fr')){
  echo "l'utlisateur avec cet email existe";
}
?>

Mettre un utilisateur à jours :
<?php $bundle->getClass('userBundle')->updateUser('kodmit', 'email', 'new_email@test.com'); ?>

Supprimer un utilisateur :
<?php $bundle->getClass('userBundle')->removeUser('kodmit'); ?>
```
 
