# SPRINGDAYS

Projet : création d'un gestionnaire de jardin virtuel

# 1 - Des spécifications au script SQL
Production d'un diagramme Entié/Association pour les spécifités de notre gesionnaire de jardin.
Ecriture du schéma relationnel dérivé du diagramme Entité/Association.
Ecriture du script SQL, permmettant la création de la base de données.

# 2 - Design du site et pages statiques
Création du site web, avec une page d'accueil, des pages statiques, et des contenus dynamiques, un menu de navigation, des statistiques sur la base de donnée : nombre d'instances pour les tables les plus importantes, 
top-5 des parcelles avec le plus de rangs, variétés les plus utilisées, etc.
Le projet fut évalué sur %ozilla Firefox.

# 3 - Fonctionnalité 1 : intégrer et afficher les variétés
Migrer les données existantes fournies (plantes et variétés) dans la base de données, puis les afficher sur une page.
L'utilisation des données fournies est obligatoire.
Ces données se trouvent dans la base de données partagée : dataset, qui contient une unique table : DonnesFournies. En utilisant la commande :
"SELECT * FROM dataset.DonnesFournies;" sur PHPMyAdmin, nous avions 8806 variétés, 193 plantes et 11 types.
Elle n'était pas bien modélisée, il était donc nécessaire de stocker son contenu dans notre base.
On a donc fait une intégration de données.
Pour chaque tuple résultat, on applique éventuellement des transformations sur les valeurs (soit directement en SQL soit en PHP), puis on écrit une requête "insert" pour peupler les tables du projet.
Si certaines données sont manquantes et ne permettent pas de respecter les contraintes de notre schéma, on utilise la valeur NULL ou une valeur par défaut. Et on peuple les tables intermédiaires si besoin il y a.

# 4 - Fonctionnalité 2 : ajouter une variété
Création d'une page pour ajouter une nouvelle variété. Celle-ci inclut un formulaire avec les informations à saisir pour la variété, avec des valeurs par défaut pour chaque champ de saisie, afin de ne pas avoir à remplir tous les champs lors des tests. Quand cela est nécéssaire, on utilise une liste pour sélectionnner une valeur (pour le nom de la plante, du semencier, les types de sol, etc.).
Le système effectue des vérifications avant d'insérer en base (ex: vérification qu'elle n'existe pas déjà avec un nom identique) et affiche des messages pertinents pour faciliter la correction des erreurs.

# 5 - Fonctionnalité 3 : générer et afficher une parcelle
But : générer une parcelle selon des paramètres saisis par l'utilisateur, puis d'afficher cette parcelle.
La page comporte donc un formulaire pour renseigner les paramètres suivants : 
- nombre de rangs minimum et maximum sur les parcelles. Si la même valeur N est saisie pour le min et le max, cela signifie que la parcelle doit avoir N rangs,
- pourcentage de rangs occupés par des cultures. A partir de la valeur saisie, l'algorithme choisit aléatoirement des variétés (parmi celles en BD) à placer sur les rangs cultivés,
- pourcentage de rangs occupés par des plantes indésirables, l'algorithme choisir aléatoirement des plantes (parmi celles en BD) à disposer sur les rangs.
La page vérifie la cohérance des pourcentages saisis (et les rangs restants sont libres sans végétation).
Quand une parcelle est générée, on la stocke en BD et on l'affiche sous le formulaire (ex: sous forme de tableau HTML).
