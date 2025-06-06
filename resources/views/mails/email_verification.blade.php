<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de votre adresse email</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-6">
        <div class="text-center">
            <img class="mx-auto h-12 w-auto" src="{{ asset('images/NextGen-logo.svg') }}" alt="Logo NextGen">
            <h2 class="mt-6 text-2xl font-bold text-gray-900">Vérification de votre adresse email</h2>
            <p class="mt-2 text-sm text-gray-600">Merci de confirmer votre adresse email pour activer votre compte</p>
        </div>
        <div class="mt-6">
            <p class="text-gray-700">
                Bonjour,
            </p>
            <p class="mt-2 text-gray-700">
                Merci de vous être inscrit sur NextGen. Pour activer votre compte et accéder à toutes les fonctionnalités de notre plateforme, veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse email.
            </p>

            <div class="mt-6 text-center">
                <a href="{{ $url }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                    Vérifier mon adresse email
                </a>
            </div>

            <p class="mt-4 text-sm text-gray-600">
                Si vous n'avez pas créé de compte, aucune action n'est requise.
            </p>
        </div>
        <div class="mt-6 border-t border-gray-200 pt-4">
            <p class="text-xs text-gray-500 text-center">
                © {{now()->format('Y')}} NextGen. Tous droits réservés.
            </p>
        </div>
    </div>
</div>
</body>
</html>