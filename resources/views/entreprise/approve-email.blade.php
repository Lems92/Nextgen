<!-- filepath: c:\xampp\htdocs\Nextgen\resources\views\entreprise\approve-email.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'email</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-6">
        <div class="text-center">
            <img class="mx-auto h-12 w-auto" src="{{ asset('/storage/NextGen-logo.svg') }}" alt="Logo">
            <h2 class="mt-6 text-2xl font-bold text-gray-900">Modifier l'email avant l'envoi</h2>
        </div>
        <form action="{{ route('candidats.approveWithEmail') }}" method="POST" class="mt-6">
            @csrf
            <input type="hidden" name="etudiant_id" value="{{ $etudiant->id }}">
            <input type="hidden" name="offre_id" value="{{ $offre->id }}">
            <div class="mb-4">
                <label for="to" class="block text-sm font-medium text-gray-700">À (To)</label>
                <p class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 px-3 py-2">
                    {{ $etudiant->user->email?? 'Email non disponible' }}
                </p>
            </div>
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-gray-700">Sujet</label>
                <input type="text" id="subject" name="subject" value="Invitation à un entretien" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="body" name="body" rows="6" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">Bonjour {{ $etudiant->prenom }},

Nous sommes ravis de vous inviter à un entretien pour le poste de {{ $offre->titre_poste }}.</textarea>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm">Envoyer</button>
                <a href="{{ route('entreprise.gerer-candidat') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md shadow-sm">Annuler</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>