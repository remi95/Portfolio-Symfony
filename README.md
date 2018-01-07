PORTFOLIO REMI MAFAT
Projet scolaire - D�cembre 2017

Installation

- git clone https://github.com/remi95/Portfolio-Symfony.git
- En console�: composer install
- Profitez en pour configurer les infos du parameters.yml�: database, mail (suivez les instructions�;))
- Une fois les param�tres entr�s, en console�: php bin/console doctrine:database:create
- Puis�: php bin/console doctrine:schema:update --force
- Toujours en console�: php bin/console doctrine:fixtures:load
- Il ne vous reste plus qu?a acc�der au site sur votre navigateur favoris (n?oubliez pas /web�;))

Les utilisateurs

(La s�curit� est importante :D)

- Admin - azerty
- User - azerty
- Toto - azerty

Les r�les

Utilisateur non authentifi� :
Peut voir le portfolio, le blog et les diff�rents articles, ainsi que leurs commentaires.
Il ne peut cependant pas publier de commentaire, ni les signaler.
Il peut bien s�r s'inscrire et se connecter.
 
Utilisateur authentifi� :
Peut voir le portfolio, le blog et les diff�rents articles, ainsi que leurs commentaires.
Il peut commenter les diff�rents articles, ainsi que signaler un commentaire. L'admin sera alors alert� de ce signalement et pourra d�cider lui-m�me de ce qu'il veut faire.
Il n'acc�de pas � la partie Admin.
Puisqu'il est connect�, il peut aussi acc�der � son profil et modifier ses donn�es (mdp, avatar, email, etc...)

Administrateur :
Bien entendu l'admin peut tout voir, comme les autres.
Sur un article, au niveau des commentaires, il peut aussi directement en supprimer un.
Dans la navbar, il dispose d'un nouveau bouton lorsque des commentaires sont signal�s, et qui le m�ne directement dans la partie Admin, sur la gestion des commentaires.
La partie Admin lui permet de g�rer toutes les donn�es. Il peut donc ajouter, modifier ou supprimer des articles, les donn�es du portfolio, des cat�gories, etc...

Pr�cisions

Aucune image (article et utilisateur) n'est mise par d�faut, � vous de les uploads�!
Depuis la partie Admin pour les articles, et depuis 'mon compte' pour les avatars.
