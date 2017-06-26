# Bibliothèque - Consultation & réservation

Projet réalisé lors de la formation de développeur.
Refonte d'un site de bibliothèque permettant la consultation et la réservation des oeuvres en ligne.
Développé avec le framework Symfony 3

## Fonctionnalités

Scénario :
Un membre réserve un ouvrage. Il se déplace physiquement à la bibliothèque afin de le récupérer. A partir de là, l'administrateur passe la "réservation" en "emprunt". Le membre a alors un délai de 2 semaines pour rendre l'ouvrage. Quand il le rend, l'administrateur, passe le statut en "rendu".

- Inscription et authentification d'un utilisateur.
- Droits utilisateur : visiteur / membre / administrateur
  - Le visiteur peut seulement consulter les ouvrages
  - Le membre peut réserver
  - L'administrateur valide la réservation ainsi que la restitution
- L'onglet "Evénements" utilise AJAX
- Chaque utilisateur a la possibilité de consulter les ouvrages réservés et empruntés, il peut également annuler ses réservations.
- L'administrateur change le statut des ouvrages (réservé > emprunté > rendu).
- Un onglet "historique" visible uniquement par l'admin lui permettant de voir qui a emprunter quoi et quand.
- Site responsive.

## Utilisation
- Création et importation de la base de données `/db directory`
- Installez les dépendances : `composer install` and configurez vos paramètres de base de données.
- Pour lancer le serveur : `php bin/console server:run`
