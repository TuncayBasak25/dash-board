# dash-board
Projet Dashboard - Gestion d'achat de matériel
PHP Orienté Objet et MySQL

Ce dashboard devra être sécurisé par un système de login

Il doit permettre de :

    Lister les produits
    Modifier un produit
    Supprimer un produit
    Ajouter un produit

Pour chaque produit on doit rentrer les informations suivantes

    Lieux d'achat (En vente directe ou e-commerce)
        Si vente directe - Possibilité de saisir l'adresse
        Si e-commerce - Possibilité de saisir l'url du e-commerce
    Nom du produit
    Référence du produit
    Catégorie (Electroménager, TV-HIFI, Bricolage, Voiture....), Le produit n'appartiendra qu'à une seule catégorie
    Date d'achat
    Date de fin de garantie
    Prix
    Zone de saisie pour rentrer touts les conseils d'entretien du produit
    Photo du ticket d'achat
    Manuel d’utilisation (Pas obligatoire s'il n'existe pas)

Il faudra faire attention a respecter le pattern PRG https://fr.wikipedia.org/wiki/Post-redirect-get , bien vérifier que l'administration soit sécurisée, et que les formulaires soient validées aussi bien en Front (coté html,js) qu'en Back (coté php).
Il faudra réaliser un Modèle Conceptuel de Données.
Il faudra structurer le projet en MVC.


Bonus:

- Tâche cron qui envoie un email lorsque le produit arrive à terme de sa garantie
- Une page ou l'on peut voir un graphique comparant les sommes dépensées par catégorie entre deux dates.


Temps de dev: 2 semaines


Groupes:
Robin, Ismail, Alexa
Olivier, Emma, Sylvain
Sergio, Yacine, Philippe
Tuncay, Ali, Oswald
Kévin, Warren, Yoann
