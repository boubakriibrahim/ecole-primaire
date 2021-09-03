<p align="center"><a href="http://www.ensi-uma.tn/" target="_blank"><img src="https://i.postimg.cc/vZDn07KQ/ensi2.png" width="200"></a></p>

<p align="center">
ECOLE NATIONALE DES SCIENCES DE L’INFORMATIQUE
</p>
<h1 align="center">
    Gestion administrative d'une école primaire
</h1>


## Présentation générale du sujet
Il s'agit de mettre en place une solution web qui offre aux administrateurs et enseignants d’une école primaire, un système de gestion. 
   
L'application devra permettre également de faciliter l'accès aux documents administratives et la gestion des principaux axes d’une école.


## Présentation des fonctionnalités demandées de l'application
Il s’agit d’une solution web (site web) constituée d’une page d’accueil pour la définition de l’école puis une page de connexion qui rédige vers le tableau de bord de la gestion.

Le projet admet deux tableaux de bord différents un pour l’administrateur et un autre pour l’enseignant. Toutes les importantes gestions sont désignées par la méthode CRUD qui permet l’affichage, la création, la mise à jour et l’effacement des différentes modèles (enseignants, élèves, classes …). 

### Espace Administrateur
-	La mise à jour des données personnelles.
-	La mise à jour des données de l’école.
-	Les plus importantes statistiques de l’école.
-	La gestion des documents administratives.
-	La gestion des enseignants.
-	La gestion des élèves.
-	La gestion des classes.
-	La gestion des matières.
-	La gestion des salles.
-	La gestion des séances.
-	L’affectation des enseignants.
-	La gestion des emplois de temps.

### Espace Enseignant

-	La mise à jour des données personnelles.
-	Les plus importantes statistiques de l’école.
-	Voir son emploi de temps.
-	La gestion des élèves.
-	La gestion des classes (l’ajout des listes, la présence et l’affectation des notes).


## Installation du projet

### Les logiciels pour l'installation

- NodeJs
- Composer
- npm
- Wampserver ou xampp
- php 7.4+

### Cloner le projet
```
git clone https://github.com/boubakriibrahim/ecole-primaire.git
```

### Copie du fichier de l'environnement

Création d'un tableau dans la base de données puis copier le fichier .env.example en .env et modifier les paramétres de votre base de données

### Ajout des examples pour les tableaux des bases de données

Vous pouvez modifier le fichier ecole-primaire\database\seeders\DatabaseSeeder.php dans la fonction run en supprimant les commentaires des modeles.

```
php artisan db:seed
```

### Installation des dépendances

```
composer update
composer install
npm install
```


### Génération du clé et migration du base de données

```
php artisan key:generate  
php artisan cache:clear
php artisan migrate
```

### Modification du fichier du service

Accéder au fichier ecole-primaire\app\Providers\AppServiceProvider.php et rendre non commentaire la variable $ecoleCreds dans les lignes 30 et 31

### Execution du projet

```
php artisan serve
```

Vous pouvez le visiter sur le lien locale : http://localhost:8000

### Test du projet deployé

Visiter le lien https://ecole-primaire-ensi.herokuapp.com/

Accéder en temps que Administrateur :
```
Email: admin@gmail.com
Password: 12345678
```
Accéder en temps que Enseignant :
```
Email: prof1@gmail.com
Password: 87654321
```
