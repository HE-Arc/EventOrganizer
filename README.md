#EventOrganizer

### Problème
Lors de beaucoup de soirées / sorties / balades entre amis, des groupes whatsapp / facebook sont créés, ceux-ci peuvent devenir très désordonnés suivant le nombre de personnes y participant, et au final il est très difficile de s'organiser et tout le monde finit par amener (boissons, nourriture, etc..) comme bon lui semble.

### Solution
EventOrganizer (un nom sympa est encore à définir) permet de simplifier l'organisation en proposant de spécifier ce que l'organisateur a besoin (10 L de bières, 5 L de coca, 3 paquets de chips etc...) et d'envoyer le lien de l'application aux participants, qui eux spécifieront les aliments qu'ils prendront à l'événement.

# Cahiers des charges

### Must have
* Authentification simple (Email + pwd) ou Simple pseudo + cookie
* Un utilisateur authentifié peut créer un événement et le partager
* Le créateur d'un événement peut définir ce qu'il attend comme objets, et la quantité de celui-ci (Choix de l'unité également)
* Un utilisateur authentifié ayant accès au lien de partage peut indiquer ce qu'il prend et quelle quantité
* Un utilisateur authentifié ayant accès au lien de partage peut également consulter qui prend quoi
* Responsive design

### Nice to have
* Authentification via Facebook, Google...
* Rappel via notifications et mails (mailchimp ?)
* Règles (Chaque participant doit prendre au minimum x quantité)

# Technos
* Laravel Framework
* [Materialize CSS](http://materializecss.com) & JQuery
* MariaDB

# Maquettes & Sitemap (voir wiki pour plus d'infos à l'avenir)
* [Site map] (http://diogoferreira.ch/webapp-hearc/sitemap.jpg)
* [Page event] (http://diogoferreira.ch/webapp-hearc/page_events.html)

# Schéma de la base de données
* [Schéma BDD] (http://diogoferreira.ch/webapp-hearc/bdd.jpg)
