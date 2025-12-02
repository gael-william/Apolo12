# Configuration Email - Système de Notification de Commandes

## 🎯 Vue d'ensemble

Le système d'envoi d'email automatique a été implémenté pour notifier les administrateurs et boutiquiers lors de nouvelles commandes.

## 📧 Fonctionnalités

- ✅ **Email automatique** après chaque commande
- ✅ **Destinataires multiples** : admins de la boutique + super admins
- ✅ **Template professionnel** avec tous les détails de la commande
- ✅ **Gestion d'erreurs** avec logs détaillés
- ✅ **Envoi asynchrone** via Jobs Laravel

## 🛠️ Configuration

### 1. Configuration Email (Production)

Modifiez votre fichier `.env` avec les paramètres de votre serveur SMTP :

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=votre-email@gmail.com
MAIL_PASSWORD=votre-mot-de-passe-app
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@pfnl.com"
MAIL_FROM_NAME="PFNL.com"
```

### 2. Configuration Email (Développement/Test)

Pour les tests, utilisez la configuration `log` :

```env
MAIL_MAILER=log
MAIL_FROM_ADDRESS="noreply@pfnl.com"
MAIL_FROM_NAME="PFNL.com"
```

Les emails seront enregistrés dans `storage/logs/laravel.log`.

## 🧪 Test du Système

### Commande de test

```bash
php artisan test:email votre-email@example.com
```

### Test manuel

1. Créez une commande via l'interface web
2. Vérifiez les logs : `storage/logs/laravel.log`
3. Ou configurez un vrai serveur SMTP pour recevoir les emails

## 📋 Structure des Emails

### Destinataires
- **Admins de la boutique** : Tous les utilisateurs liés à la boutique de la commande
- **Super admins** : Tous les utilisateurs avec le rôle `super_admin`

### Contenu de l'email
- 📊 **Numéro de commande** et statut
- 🏪 **Informations de la boutique**
- 👤 **Détails du client** (téléphone)
- 🛍️ **Liste des produits** avec quantités et prix
- 💰 **Montant total**
- 🔗 **Lien vers l'administration**

## 🔧 Personnalisation

### Modifier le template d'email

Le template se trouve dans : `resources/views/emails/commande-notification.blade.php`

### Modifier la classe Mail

La classe Mail se trouve dans : `app/Mail/CommandeNotification.php`

### Modifier le Job

Le Job se trouve dans : `app/Jobs/SendCommandeNotification.php`

## 🚀 Déploiement

### 1. Configuration des queues (Recommandé)

Pour un envoi asynchrone optimal, configurez les queues :

```env
QUEUE_CONNECTION=database
```

Puis créez la table des jobs :

```bash
php artisan queue:table
php artisan migrate
```

Et démarrez le worker :

```bash
php artisan queue:work
```

### 2. Configuration SMTP populaire

#### Gmail
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=votre-email@gmail.com
MAIL_PASSWORD=mot-de-passe-app-gmail
MAIL_ENCRYPTION=tls
```

#### Outlook/Hotmail
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp-mail.outlook.com
MAIL_PORT=587
MAIL_USERNAME=votre-email@outlook.com
MAIL_PASSWORD=votre-mot-de-passe
MAIL_ENCRYPTION=tls
```

#### SendGrid
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=votre-api-key-sendgrid
MAIL_ENCRYPTION=tls
```

## 📝 Logs et Debugging

### Vérifier les logs

```bash
tail -f storage/logs/laravel.log
```

### Erreurs communes

1. **Erreur SMTP** : Vérifiez les paramètres SMTP
2. **Email vide** : Vérifiez que les utilisateurs ont des emails valides
3. **Job non exécuté** : Vérifiez que le worker de queue fonctionne

## 🔒 Sécurité

- Les emails d'erreur sont loggés mais n'interrompent pas la création de commande
- Validation des emails avant envoi
- Gestion des exceptions pour éviter les crashs

## 📞 Support

En cas de problème :
1. Vérifiez les logs : `storage/logs/laravel.log`
2. Testez avec la commande : `php artisan test:email`
3. Vérifiez la configuration SMTP
4. Assurez-vous que les utilisateurs ont des emails valides 