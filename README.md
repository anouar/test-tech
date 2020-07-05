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

#Explications :
1°) besoin 1
```bash
- Installation des bundles DoctrineMigrationsBundle et MakerBundle pour faciliter la gestion de la base de données
- Ajout de l'entité Template pour pouvoir gérer les templates dont le template "confirmation_001" 
- suppression du class Utils\Template et le remplacer par l'entité Template dans TemplateManager
- Suppression de la méthode confirmTemplate() dans MailerProvider : il est recommender pour les templates mail d'utilser soit des fichiers twig soit une table 
```
2°) besoin 2 
```bash
- Installation de swiftmailer pour l'envoi de mail 
- Suppression de la récursiviter ainsi que l'injection de l'Interface Client\MailerInterface  
 => problème d'injection de dépendance "circular reference detected" vu que la méthode sendMail() existe aussi dans l'interface Provider\MailerProviderInterface 
- injection du service MailerProvider "app.mailer.provider dans service.yaml" dans la classe RegisterPersister pour l'utiliser dans l'envoi de Mail
```
3°) Les Erreurs sont corrigés 
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
