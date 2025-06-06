<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Réinitialisation de mot de passe - NextGen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #f8f9fa;
        }
        .logo {
            max-width: 200px;
            height: auto;
        }
        .content {
            padding: 20px;
            background-color: #ffffff;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #66022b;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            margin: 20px 0;
            border: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #4d021f;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('/images/NextGen-logo.svg') }}" alt="NextGen Logo" class="logo">
        </div>
        
        <div class="content">
            <h2>Réinitialisation de votre mot de passe</h2>
            
            <p>Bonjour,</p>
            
            <p>Vous recevez cet email car nous avons reçu une demande de réinitialisation de mot de passe pour votre compte NextGen.</p>
            
            <p>Pour réinitialiser votre mot de passe, veuillez cliquer sur le bouton ci-dessous :</p>
            
            <div style="text-align: center;">
                <a href="{{ $actionUrl }}" class="button">Réinitialiser mon mot de passe</a>
            </div>
            
            <p>Si vous n'avez pas demandé de réinitialisation de mot de passe, aucune action n'est requise.</p>
            
            <p>Ce lien de réinitialisation expirera dans 10 minutes.</p>
            
            <p>Cordialement,<br>L'équipe NextGen</p>
        </div>
        
        <div class="footer">
            <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
            <p>&copy; {{ date('Y') }} NextGen. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html> 