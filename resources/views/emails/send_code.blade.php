<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Code de Vérification du Parrainage</title>
</head>
<body>
    <h1>Bonjour {{ $electeur->nom }},</h1>
    <p>Votre code de vérification pour enregistrer votre parrainage est : <strong>{{ $codeVerification }}</strong></p>
    <p>Merci d'utiliser notre service.</p>
    <p>Cordialement,</p>
    <p>L'équipe KaayParrainer</p>
</body>
</html>