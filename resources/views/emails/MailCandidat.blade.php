<!DOCTYPE html>
<html>
<head>
    <title>Votre compte candidat a été créé</title>
</head>
<body>
    <h1>Bonjour {{ $candidat->nom }},</h1>
    <p>Votre compte candidat a été créé avec succès.</p>
    <p>Voici vos informations de connexion :</p>
    <p>Email : {{ $candidat->adresse_email }}</p>
    <p>Mot de passe : {{ $password }}</p>
    <p>Vous pouvez vous connecter en utilisant le lien suivant : <a href="{{ $loginUrl }}">Se connecter</a></p>
    <p>Merci,</p>
    <p>L'équipe de KayParrainer</p>
</body>
</html>