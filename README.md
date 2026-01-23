<img src="http://getkirby.com/assets/images/github/starterkit.jpg" width="300">


Voici les étapes pour installer ce projet spécifique :

1. **Installer les dépendances avec Composer**
``` bash
   composer install
```
1. **Configurer votre serveur web**
    - Assurez-vous que votre serveur web (Apache, Nginx) pointe vers le dossier du projet
    - Si vous utilisez PHP intégré pour le développement local, vous pouvez lancer :
``` bash
     php -S localhost:8000
```
1. **Permissions des fichiers**
    - Assurez-vous que les dossiers suivants sont accessibles en écriture :
``` 
     site/accounts
     site/sessions
     content
     media
```
1. **Accéder au Panel d'administration**
    - Ouvrez votre navigateur et accédez à `http://localhost:8000/panel`
    - Créez un compte administrateur lors de votre première visite

2. **Configuration supplémentaire (si nécessaire)**
    - Vérifiez et modifiez les fichiers de configuration dans le dossier `site/config`
    - Personnalisez les variables d'environnement si votre projet en utilise

## Dépannage courant
- Si vous rencontrez des erreurs lors de `composer install`, assurez-vous d'avoir PHP 7.4+ installé
- Problèmes d'autorisations : vérifiez que les dossiers mentionnés ci-dessus ont les permissions appropriées
- Erreurs de module PHP : assurez-vous que les extensions PHP requises sont activées (mbstring, curl, etc.)

Pour plus de détails sur la configuration avancée, consultez la [documentation officielle de Kirby](https://getkirby.com/docs/guide/quickstart).


