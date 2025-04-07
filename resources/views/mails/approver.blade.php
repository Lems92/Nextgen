<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de compte</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-6">
        <div class="text-center">
            <img class="mx-auto h-12 w-auto" src="<?= asset("/storage/NextGen-logo.svg"); ?>" alt="Logo">
            <h2 class="mt-6 text-2xl font-bold text-gray-900">Compte Confirmé</h2>
            <p class="mt-2 text-sm text-gray-600">Votre compte a été confirmé avec succès.</p>
        </div>
        <div class="mt-6">
            <p class="text-gray-700">
                Bonjour  {{$data['prenom']}}, 
            </p>
            <p class="mt-2 text-gray-700">
                Félicitations ! Votre candidature pour le poste a été approuvée.
            </p>
            <p class="mt-4 text-gray-700">
                Nous vous contacterons bientôt pour les prochaines étapes.

            </p>
        </div>
        <div class="mt-6 border-t border-gray-200 pt-4">
            <p class="text-xs text-gray-500 text-center">
                © {{now()->format('Y')}} NextGen. All rights reserved.
            </p>
        </div>
    </div>
</div>
</body>
</html>
