<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rappel : Complétez votre profil</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-6">
        <div class="text-center">
            <img class="mx-auto h-12 w-auto" src="{{ asset('images/NextGen-logo.svg') }}" alt="Logo NextGen">
            <h2 class="mt-6 text-2xl font-bold text-gray-900">Complétez votre profil</h2>
            <p class="mt-2 text-sm text-gray-600">Votre profil n'est pas encore complet</p>
        </div>
        <div class="mt-6">
            <p class="text-gray-700">
                Bonjour,
            </p>
            <p class="mt-2 text-gray-700">
                Nous avons remarqué que votre profil n'est pas encore complet. Pour maximiser vos chances de trouver des opportunités pertinentes, nous vous invitons à compléter les sections suivantes :
            </p>

            <div class="bg-gray-50 p-6 rounded-lg mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Sections à compléter :</h2>
                <ul class="list-disc pl-6 space-y-2">
                    <li class="text-gray-700">Photo de profil</li>
                    <li class="text-gray-700">Description personnelle</li>
                    <li class="text-gray-700">Éducation (école/université, domaine d'études, niveau)</li>
                    <li class="text-gray-700">Expérience académique</li>
                    <li class="text-gray-700">Compétences techniques</li>
                    <li class="text-gray-700">Compétences transversales</li>
                    <li class="text-gray-700">Langues</li>
                    <li class="text-gray-700">Expérience professionnelle</li>
                    <li class="text-gray-700">Portfolio</li>
                    <li class="text-gray-700">Centres d'intérêt</li>
                    <li class="text-gray-700">Documents (diplôme, lettre de recommandation)</li>
                    <li class="text-gray-700">Préférences de carrière (secteur d'activité, type d'emploi)</li>
                    <li class="text-gray-700">Disponibilité</li>
                </ul>
            </div>

            <p class="mt-4 text-gray-700">
                Pour compléter votre profil, connectez-vous à votre compte et accédez à la section "Mon profil".
            </p>

            <div class="mt-6 text-center">
                @if($userType === 'etudiant')
                    <a href="{{ route('etudiants.edit_profile') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                        Compléter mon profil
                    </a>
                @elseif($userType === 'entreprise')
                    <a href="{{ route('entreprise.modifier_page_entreprise') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                        Compléter mon profil
                    </a>
                @endif
            </div>
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