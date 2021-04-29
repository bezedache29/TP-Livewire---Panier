# Développement d'un module de mise au panier en Laravel / Livewire

## 👌 Comportements attendus

- Les données produits sont issus de la base de données (photo, titre, prix, description et quantité)
- L'affichage des produits doit être paginé
- Le contenu du panier doit être stocké en session
- L'état affiché/masqué du panier doit être maintenu lors de l'ajout d'un produit
- Le nombre de produits de la pastille correspond au nombre total de produits (et pas au nombre de produits différents)
- Il n'est pas possible d'ajouter plus de produits que le stock disponible (mais inutile de décrémenter le stock en base de données à l'ajout d'un produit dans le panier)
- Les quantités affichées dans le panier et dans la liste des produits doivent être synchronisées : il est possible de modifier la quantité via les boutons `-` et `+` ainsi qu'en saisissant directement une autre quantité dans le champ de formulaire indiquant la quantité (dans le panier ou dans le bloc produit)
- Globalement, le rendu et le fonctionnement doit être au plus proche de celui du prototype

## ⚠️ Remarques

- Vous devez utiliser Livewire, sans utilisation de javascript.
- Vous devez vous assurer de limiter la consommation des ressources serveur tout en rendant l'interface la plus fluide et la plus ergonomique possible
    - Il est donc recommandé d'installer la **debugbar** de Laravel pour visualiser les requêtes SQL : [https://github.com/barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)
    - Il est donc également recommandé d'utiliser les fonctionnalités de **loading state**, de **debouncing** et de **lazy upload** de Livewire
- Les données en provenance de champ de formulaire devront être validées
- Il n'est pas demandé d'interface d'administration des produits, ni de commandes, etc...

## ⏳ Durée de réalisation

- Le projet sera réalisé individuellement pendant les séances des 29 avril et 6 mai.
- Pendant les séances, je suis disponible pour vous débloquer si nécessaire.
- Le projet devra être rendu au plus tard le dimanche 9 mai au soir.

## 📦 Livrable

- Une archive contenant tout le projet sauf les dossiers vendor et node_modules
- Pensez à fournir vos **migrations** et le fichier **composer.json** !
- Livrable à envoyer sur Slack en privé