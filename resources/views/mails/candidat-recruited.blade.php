<!-- filepath: c:\xampp\htdocs\Nextgen\resources\views\emails\candidat-recruited.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Recrutement</title>
</head>
<body>
    <h1>Félicitations {{ $etudiant->prenom }} {{ $etudiant->nom }} !</h1>
    <p>Nous sommes ravis de vous informer que vous avez été recruté pour le poste de {{ $etudiant->offres->first()->titre_poste }}.</p>
    <p>Nous vous contacterons bientôt pour les prochaines étapes.</p>
    <p>Cordialement,</p>
    <p>L'équipe NextGen</p>
</body>
</html>