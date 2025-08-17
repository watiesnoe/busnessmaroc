<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Convocation à un entretien</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f9f9f9; padding: 20px;">
<div style="max-width: 600px; background: white; padding: 20px; border-radius: 8px;">
    <h2 style="color: #2d89ef;">Bonjour {{ $nom }},</h2>
    <p>
        Félicitations 🎉 ! Suite à votre candidature pour le poste de
        <strong>{{ $poste }}</strong>, nous avons le plaisir de vous convoquer à un entretien.
    </p>
    <p>
        <strong>Date :</strong> {{ $date }}<br>
        <strong>Lieu :</strong> {{ $lieu }}
    </p>
    <p>
        Merci de bien vouloir confirmer votre présence par retour de mail.
    </p>
    <p>
        Cordialement,<br>
        L'équipe RH
    </p>
</div>
</body>
</html>
