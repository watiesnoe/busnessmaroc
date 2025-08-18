{{-- resources/views/admin/tickets/print.blade.php --}}
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ticket #{{ $ticket->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 80mm; /* largeur thermique classique */
            margin: 0;
            padding: 0;
            background: #fff;
            color: #333;
        }

        .ticket-container {
            border: 2px solid #333;
            border-radius: 5px;
            padding: 5px;
            box-sizing: border-box;
        }

        /* Entête entreprise */
        .company-header {
            display: flex;
            align-items: center;
            padding: 5px;
            background: #007bff;
            color: #fff;
            margin-bottom: 5px;
        }
        .company-logo {
            width: 40px;
            height: 40px;
            object-fit: contain;
            margin-right: 10px;
            border-radius: 3px;
            background: #fff;
            padding: 2px;
        }
        .company-info h2 {
            margin: 0;
            font-size: 14px;
        }
        .company-info p {
            margin: 1px 0;
            font-size: 10px;
        }

        /* Titre événement */
        .ticket-header {
            text-align: center;
            padding: 5px 0;
            border-bottom: 1px dashed #333;
        }
        .ticket-header h1 {
            margin: 0;
            font-size: 14px;
        }
        .ticket-header small {
            font-size: 10px;
        }

        /* Corps du ticket */
        .ticket-body {
            padding: 5px 0;
        }
        .ticket-body p {
            margin: 3px 0;
            font-size: 12px;
        }
        .ticket-body strong {
            width: 80px;
            display: inline-block;
        }

        .badge {
            display: inline-block;
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 11px;
            color: #fff;
        }
        .badge-success { background-color: #28a745; }
        .badge-warning { background-color: #ffc107; color: #333; }

        /* Ligne perforée */
        .cut-line {
            text-align: center;
            font-size: 10px;
            margin: 8px 0;
            border-top: 1px dashed #333;
            line-height: 0.1em;
        }
        .cut-line span {
            background:#fff;
            padding:0 5px;
        }

        /* Footer ticket */
        .ticket-footer {
            text-align: center;
            font-size: 10px;
            padding: 5px 0;
            margin-top: 5px;
        }

        @media print {
            body { width: 80mm; }
            .ticket-container { box-shadow: none; }
        }
    </style>
</head>
<body>
<div class="ticket-container">

    <!-- Entête entreprise -->
    <div class="company-header">
        @if($ticket->evenement->logo)
            <img src="{{ asset('storage/'.$ticket->evenement->logo) }}" alt="Logo" class="company-logo">
        @endif
        <div class="company-info">
            <h2>{{ config('app.name') }}</h2>
            <p>Téléphone: +223 00 00 00 00</p>
            <p>Email: contact@entreprise.com</p>
        </div>
    </div>

    <!-- Titre événement -->
    <div class="ticket-header">
        <h1>{{ $ticket->evenement->titre ?? 'Événement inconnu' }}</h1>
        <small>{{ $ticket->evenement && $ticket->evenement->date ? $ticket->evenement->date->format('d/m/Y H:i') : 'Date non définie' }}</small>
    </div>

    <!-- Contenu ticket -->
    <div class="ticket-body">
        <p><strong>Nom :</strong> {{ $ticket->user->name ?? 'Utilisateur supprimé' }}</p>
        <p><strong>Email :</strong> {{ $ticket->user->email ?? '-' }}</p>
        <p><strong>Quantité :</strong> {{ $ticket->quantite ?? '-' }}</p>
        <p><strong>Montant :</strong> {{ isset($ticket->montant_total) ? number_format($ticket->montant_total, 0, ',', ' ') . ' FCFA' : '-' }}</p>
        <p><strong>Statut :</strong>
            <span class="badge {{ $ticket->statut == 'paye' ? 'badge-success' : 'badge-warning' }}">
                {{ ucfirst($ticket->statut ?? '-') }}
            </span>
        </p>
        <p><strong>Achat :</strong> {{ $ticket->created_at ? $ticket->created_at->format('d/m/Y H:i') : '-' }}</p>
    </div>

    <!-- Ligne perforée -->
    <div class="cut-line"><span>--- coupe ici ---</span></div>

    <!-- Footer -->
    <div class="ticket-footer">
        Merci pour votre réservation !<br>
        {{ config('app.url') }}
    </div>

</div>

<script>
    window.onload = function() {
        window.print();
    }
</script>
</body>
</html>
