# PORTFOLIO 
Par Rémi Mafat

Projet scolaire - Décembre 2017

## Installation

- git clone https://github.com/remi95/Portfolio-Symfony.git
- En console : `composer install`
- Profitez en pour configurer les infos du _parameters.yml_ : database, mail (suivez les instructions ;))
- Une fois les paramètres entrés, en console : `php bin/console doctrine:database:create` pour créer la base de données en local
- Puis : `php bin/console doctrine:schema:update --force` de manière à créer la structure de la base
- Toujours en console : `php bin/console doctrine:fixtures:load` pour remplir la base avec des données test
- Il ne vous reste plus qu'à accéder au site sur votre navigateur favoris (n'oubliez pas /web ;))

## Les utilisateurs

(La sécurité est importante :D)

- Admin - azerty (Le seul ayant les droits d'admin)
- User - azerty (Simple utilisateur)
- Toto - azerty (Simple utilisateur)

## Les rôles

**Utilisateur non authentifié** :

Peut voir le portfolio, le blog et les différents articles, ainsi que leurs commentaires.
Il ne peut cependant pas publier de commentaire, ni les signaler.
Il peut bien sûr s'inscrire et se connecter.
 
**Utilisateur authentifié** :

Peut voir le portfolio, le blog et les différents articles, ainsi que leurs commentaires.
Il peut commenter les différents articles, ainsi que signaler un commentaire. L'admin sera alors alerté de ce signalement et pourra décider lui-même de ce qu'il veut faire.
Il n'accède pas à la partie Admin.
Puisqu'il est connecté, il peut aussi accéder à son profil et modifier ses données (mdp, avatar, email, etc...)

**Administrateur** :

Bien entendu l'admin peut tout voir, comme les autres.
Sur un article, au niveau des commentaires, il peut aussi directement en supprimer un.
Dans la navbar, il dispose d'un nouveau bouton lorsque des commentaires sont signalés, et qui le mène directement dans la partie Admin, sur la gestion des commentaires.
La partie Admin lui permet de gérer toutes les données. Il peut donc ajouter, modifier ou supprimer des articles, les données du portfolio, des catégories, etc...

## Précisions

Aucune image (article et utilisateur) n'est mise par défaut, à vous de les uploads !
Depuis la partie Admin pour les articles, et depuis 'mon compte' pour les avatars.
