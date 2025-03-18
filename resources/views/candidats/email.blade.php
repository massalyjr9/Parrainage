<!DOCTYPE html>
<html>
<head>
    <title>Votre compte candidat a été créé</title>
</head>
<body>
    <h1>Bonjour {{ $user->name }},</h1>
    <p>Votre compte candidat a été créé avec succès. Voici vos informations de connexion :</p>
    <p><strong>Email :</strong> {{ $user->email }}</p>
    <p><strong>Mot de passe :</strong> {{ $password }}</p>
    <p>Vous pouvez vous connecter en utilisant le lien suivant :</p>
    <p><a href="{{ $loginUrl }}">Se connecter</a></p>
    <p>Merci,</p>
    <p>L'équipe {{ config('app.name') }}</p>
</body>
</html>