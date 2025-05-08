# Projet Laravel : Gestion des Animaux avec Authentification

Ce projet est une application web développée avec **Laravel 12** pour gérer une liste d'animaux (CRUD) avec une authentification utilisateur. Il a été créé dans le cadre d'un apprentissage des bases de Laravel, en explorant les concepts clés du framework, la gestion des erreurs, et l'intégration de **Bootstrap 5** pour le design. Ce README résume les fonctionnalités du projet, les concepts appris, et les étapes pour l'exécuter.

## Description du projet

L'application permet de gérer des animaux (nom, espèce, propriétaire, état de santé) via un CRUD (Create, Read, Update, Delete) sécurisé par une authentification. Les utilisateurs doivent se connecter pour accéder aux fonctionnalités du CRUD. La page de connexion est la première affichée, et une fois authentifié, l'utilisateur est redirigé vers la liste des animaux.

### Fonctionnalités principales
- **Authentification** :
  - Page de connexion avec champs `email` et `mot de passe`.
  - Validation des identifiants et gestion des erreurs (identifiants incorrects).
  - Redirection vers la liste des animaux après une connexion réussie.
  - Protection des routes du CRUD avec le middleware `auth`.
  - **mot de passe** : secret
- **CRUD pour les animaux** :
  - **Lister** : Afficher tous les animaux avec pagination (10 par page).
  - **Voir** : Consulter les détails d'un animal.
  - **Créer** : Ajouter un nouvel animal.
  - **Modifier** : Mettre à jour les informations d'un animal.
  - **Supprimer** : Supprimer un animal avec confirmation.
- **Interface utilisateur** :
  - Design responsive avec **Bootstrap 5** (cartes, formulaires, alertes).
  - Messages de succès et d'erreur stylisés.
- **Redirection** :
  - La racine (`/`) redirige vers la page de connexion (`/login`).
  - Après connexion, accès à `/animals` et autres routes du CRUD.

## Ce que j'ai appris

Ce projet m'a permis de découvrir et de maîtriser plusieurs concepts clés de Laravel et du développement web. Voici un résumé des leçons apprises :

### 1. Structure de Laravel
- **Architecture MVC** : Comprendre comment les **Modèles** (ex. `Animal`, `User`), **Vues** (Blade) et **Contrôleurs** (`AnimalController`, `AuthController`) interagissent.
- **Organisation des fichiers** :
  - Routes dans `routes/web.php`.
  - Contrôleurs dans `app/Http/Controllers`.
  - Vues dans `resources/views`.
  - Modèles dans `app/Models`.
- **Conventions Laravel** : Utilisation des noms comme `index`, `store`, `show`, `update`, `destroy` pour les méthodes RESTful.

### 2. Gestion des routes
- **Définition des routes** :
  - Routes simples (`Route::get`, `Route::post`).
  - Routes de ressources (`Route::resource`) pour générer automatiquement les routes CRUD.
  - Routes nommées (`->name('nom')`) pour une référence facile dans les vues (`{{ route('nom') }}`).
- **Redirection** :
  - Rediriger la racine (`/`) vers `/login` ou `/animals`.
  - Utiliser `redirect()->route()` pour naviguer entre les pages.
- **Middleware** :
  - Utilisation du middleware `auth` pour protéger les routes du CRUD.
  - Redirection automatique vers `/login` pour les utilisateurs non authentifiés.

### 3. Contrôleurs
- **AnimalController** :
  - Gestion des opérations CRUD pour la table `animals`.
  - Injection de modèle (`Animal $animal`) pour charger automatiquement un enregistrement via l'ID dans l'URL.
  - Validation des données avec `$request->validate`.
  - Mise à jour des enregistrements avec `$animal->update`.
- **AuthController** :
  - Affichage de la page de connexion (`index`).
  - Gestion de l'authentification (`login`) avec validation et `Auth::attempt`.
  - Régénération de session pour la sécurité (`$request->session()->regenerate()`).

### 4. Vues Blade
- **Syntaxe Blade** :
  - Utilisation de `@foreach`, `@if`, `@error` pour gérer les boucles, conditions et erreurs.
  - Affichage des données dynamiques avec `{{ $variable }}`.
  - Conservation des anciennes valeurs avec `{{ old('champ') }}`.
- **Formulaires** :
  - Création de formulaires avec `@csrf` pour la protection CSRF.
  - Simulation de méthodes HTTP (`@method('PUT')`, `@method('DELETE')`) pour le CRUD.
- **Intégration de Bootstrap** :
  - Utilisation des classes Bootstrap (`btn`, `card`, `alert`, `form-control`) pour un design responsive.
  - Création d'une vue autonome (`login.blade.php`) sans layout partagé.
- **Messages** :
  - Affichage des messages de succès (`session('success')`) et d'erreur (`@error`) dans des alertes Bootstrap.

### 5. Modèles et base de données
- **Modèle `Animal`** :
  - Définition des champs modifiables avec `$fillable`.
  - Interaction avec la table `animals` (colonnes : `name`, `species`, `owner_name`, `health_status`).
- **Modèle `User`** :
  - Utilisé pour l'authentification (table `users` avec `email` et `password`).
- **Migrations** :
  - Création des tables `animals` et `users` avec `php artisan migrate`.
  - Utilisation de colonnes comme `string` et `enum` (`health_status`).

### 6. Authentification
- **Façade `Auth`** :
  - Comprendre les façades comme une interface simplifiée pour accéder aux services Laravel.
  - Utilisation de `Auth::attempt` pour vérifier les identifiants.
- **Gestion de la session** :
  - Régénération de l'ID de session après connexion pour la sécurité.
  - Utilisation de `withErrors` et `onlyInput` pour gérer les échecs de connexion.
- **Protection des routes** :
  - Application du middleware `auth` pour restreindre l'accès aux utilisateurs connectés.

### 7. Validation
- **Validation des formulaires** :
  - Utilisation de `$request->validate` pour valider les données (`required`, `email`, `string`, `max`, `in`).
  - Affichage des erreurs dans les vues avec `@error`.
- **Exemple dans `AnimalController@update`** :
  - Validation des champs comme `name` et `health_status` avant mise à jour.
- **Exemple dans `AuthController@login`** :
  - Validation de `email` et `password` avant tentative de connexion.

### 8. Gestion des erreurs
- **Erreurs rencontrées** :
  - **"View [layout] not found"** : Résolu en créant `layouts/app.blade.php` ou en rendant les vues autonomes.
  - **`Auth()::attempt`** : Erreur de syntaxe corrigée en important `Illuminate\Support\Facades\Auth` et utilisant `Auth::attempt`.
  - **Route POST manquante** : Ajout de `Route::post('/login', ...)` pour gérer la soumission du formulaire.
- **Débogage** :
  - Utilisation de `php artisan view:clear` et `php artisan cache:clear` pour résoudre les problèmes de cache.
  - Vérification des logs dans `storage/logs/laravel.log`.

### 9. Autres compétences
- **Bootstrap 5** :
  - Création d'interfaces utilisateur modernes avec des cartes, formulaires, et alertes.
  - Gestion des classes comme `d-grid`, `shadow-sm`, `bg-primary`.
- **Commandes Artisan** :
  - `php artisan make:controller` pour créer des contrôleurs.
  - `php artisan migrate` pour exécuter les migrations.
  - `php artisan tinker` pour ajouter des utilisateurs de test.
- **Conventions RESTful** :
  - Comprendre les verbes HTTP (GET, POST, PUT, DELETE) et leurs rôles dans le CRUD.

## Prérequis
- PHP >= 8.1
- Composer
- MySQL ou autre base de données compatible
- Node.js et npm (optionnel, pour les assets)
- Laravel 11

## Installation

1. **Cloner le projet** :
   ```bash
   git clone <url-du-repo>
   cd <nom-du-projet>
