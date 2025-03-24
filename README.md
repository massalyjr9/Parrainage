<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Configuration du Projet de Gestion des Parrainages

## Prérequis
Avant d'installer et de configurer le projet, assurez-vous d'avoir les outils suivants installés sur votre machine :

- PHP >= 8.1
- Composer
- MySQL ou PostgreSQL
- Node.js et npm
- Git
- Un serveur web (Apache, Nginx, ou Laravel Sail pour Docker)

## Installation

### 1. Cloner le dépôt
```bash
git clone https://github.com/votre-repo/parrainage.git
cd parrainage
```

### 2. Installer les dépendances
```bash
composer install
npm install && npm run build
```

### 3. Configurer l'environnement
Copiez le fichier `.env.example` et renommez-le en `.env` :
```bash
cp .env.example .env
```

Modifiez ensuite le fichier `.env` pour y renseigner vos informations de base de données et autres configurations :
```env
APP_NAME=Parrainage
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=parrainage
DB_USERNAME=root
DB_PASSWORD=
```
Générez ensuite une clé d’application :
```bash
php artisan key:generate
```

### 4. Configurer la base de données
Créez la base de données manuellement puis exécutez les migrations et les seeders :
```bash
php artisan migrate --seed
```

### 5. Lancer le serveur
```bash
php artisan serve
```
L’application sera accessible sur `http://127.0.0.1:8000`.

## Guide utilisateur
### 1. Agent DGE
Pour accéder à la plateforme destinée à l'Agent DGE il faut taper l'adresse : http://localhost:8000/login/dge et ensuite procéder à l'authentification
Il peut créer un candidat, le modifier, le supprimer. Il doit crypter le fichier électorale, ensuite renseigner le checksum et enfin pouvoir téléverser ce fichier.
Il doit aussi renseigner la date d'ouverture et de fermeture des parrainages.

### 2. Electeur
Arrivé à la page d'accueil il clique sur le bouton rejoindre la plateforme pour s'inscrire. Il faut impérativement que les informations qu'il renseigne sur cette page d'inscription soit conforme avec les informations présents dans le fichier électorale. Après inscription un code de validation lui est envoyé par mail.Après vérification du code son compte est créé avec succés. Il pourra ainsi parrainer le candidat de son choix.

### 3. Candidat
Pour accéder à son espace candidat, il clique sur le bouton ''vous etes un candidat'' pour se connecter. Il recevra ces informations de connection par mail quand l'Agent DGE aura créé son compte. Il pourra visualiser l'avancement de ses parrainages et de ceux de ses concurrents.


## Support
Si vous rencontrez des problèmes, consultez la documentation Laravel ou ouvrez un ticket sur GitHub.

