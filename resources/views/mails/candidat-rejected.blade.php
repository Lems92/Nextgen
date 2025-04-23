{{-- filepath: c:\xampp\htdocs\Nextgen\resources\views\mails\candidat-rejected.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre candidature a été rejetée</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-6">
        <div class="text-center">
            <img class="mx-auto h-12 w-auto" src="{{ asset('/images/NextGen-logo.svg') }}" alt="Logo">
            <h2 class="mt-6 text-2xl font-bold text-gray-900">Candidature Rejetée</h2>
            <p class="mt-2 text-sm text-gray-600">Nous regrettons de vous informer que votre candidature n'a pas été retenue.</p>
        </div>
        <div class="mt-6">
            <p class="text-gray-700">
                Bonjour {{ $data['prenom'] ?? 'Candidat' }},
            </p>
            <p class="mt-2 text-gray-700">
                Nous vous remercions pour votre intérêt pour le poste de <strong>{{ $data['titre_poste'] ?? 'le poste spécifié' }}</strong> au sein de <strong>{{ $data['nom_entreprise'] ?? 'l\'entreprise' }}</strong>. Malheureusement, votre candidature n'a pas été retenue.
            </p>
            <p class="mt-4 text-gray-700">
                Nous vous souhaitons bonne chance pour vos futures candidatures.
            </p>
        </div>
        <div class="mt-6 border-t border-gray-200 pt-4">
            <p class="text-xs text-gray-500 text-center">
                © {{ now()->format('Y') }} NextGen. Tous droits réservés.
            </p>
        </div>
    </div>
</div>
</body>
</html>
