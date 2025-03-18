<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Code d'authentification</title>
</head>
<body>
    <h1>Bonjour {{ $electeur->nom }},</h1>
    <p>Votre code d'authentification est : <strong>{{ $code_auth }}</strong></p>
    <p>Merci d'utiliser notre service.</p>
    <p>Cordialement,</p>
    <p>L'équipe KaayParrainer</p>
</body>
</html>