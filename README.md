# README

## Contexte:
Il s’agit d’une API développée avec *Symfony* et *ApiPlatform* qui permet de créer un compte sur notre site.

Un développeur a commencé le développement mais n’a pas pu finir avant de partir en congés, 
vous devez reprendre son travail, le terminer et _le livrer dans un repo GIT (Gitlab ou Github)_.

Il a été estimé qu'il restait environ 1hr de travail, si vous voulez passer plus de temps libre à vous.
Le but de l'exercice est d'avoir un support pour la suite.

## Règles/Conseils:
* Les classes qui ont l’annotation `@Test/ReadOnly` ne doivent pas être modifiées.
* _Faire des commits réguliers avec des messages clairs._
* Un code joli/clair est toujours préférable.
* Rajouter une explication des choix faits.

## Besoins:

1°) Les classes `App\Utils\Template` et `App\Utils\TemplateManager` ont été récupérées d’un
vieux projet, il faut les refactoriser afin de les rendre comprehensible et de pouvoir facilement ajouter de nouvelle fonctionnalité.
Le tout en faisant en sorte qu’elle respecte les standard utilisé dans le projet.

2°) Il faut ajouter la fonctionnalité d’envoyer un email au client une fois que le client s’est enregistré.
* L’id du template à envoyer est `confirmation_001`
* Les données supplémentaires à envoyer sont 
    * firstName
    * lastName
    * gender
    
3°) Corriger toutes les erreurs qui restent


## Installation:

```bash
make install
```

#### Api docs
http://localhost:8080/api/docs

#### Lancer les tests unitaires
```bash
make tu
```
