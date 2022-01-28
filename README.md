

## Cloner le repository avec la clé SSH

Lancer les commandes: 

`composer install`

`yarn install`

`yarn encore dev`

Copier le dossier `.env`, puis coller le contenu dans un nouveau fichier appelé `.env.local`.

Dans le dossier `.env.local` remplir vos informations personnelles `db_name`, `db_user`, puis changer le champ `db_name` par un nom de database de votre choix.

Dans le dossier `public`, créer le dossier `uploads` puis à l’intérieur de ce dernier créer un autre dossier nommé `images`. Vous allez ensuite dans le dossier des fixtures. Copier le fichier `haies2.jpg` puis venez le coller dans le dossier `public/uploads/images` que vous venez de créer.


## Créer la database:

`symfony console doctrine:database:create`

`symfony console doctrine:migration:migrate`

`symfony console doctrine:fixtures:load`

## Mailer:

Il faut maintenant ajouter le MAILER afin d'avoir accès à la partie contact du site. Allez sur le site Mailtrap, Cliquez sur My Inbox, puis dans SMTP settings, sélectionnez Symfony 5+ dans la catégorie intégration et copiez la ligne MAILER_DSN. Ensuite, toujours dans `.env.local`, dans la partie dédiée au Mailer collez le mailer ans mettre le `#`. Mettez l'adresse de votre choix sur la ligne `MAILER_FROM_ADDRESSE` en retirant le `#`.


Lancer le localhost avec la commande `php -S localhost:8000 -t public`


## Pour accéder à la partie administrateur du site les codes d'accès sont :

E-mail: `admin@monsite.com` 

Mot de passe : `adminpassword`


Vous avez désormais accès au nouveau site de ValEspoir.
