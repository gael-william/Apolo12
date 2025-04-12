<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande - {{ $commande->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #header {
            text-align: center;
            padding: 20px;
        }

        #header img {
            max-width: 200px;
        }

        h2 {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        #total {
            margin-top: 20px;
            text-align: right;
            font-weight: bold;
        }

        #boutique-info {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div id="header">
        <img src="{{ url('/images/logo-wedga.png') }}" alt="Logo">
    </div>

    <h2>Détails de la commande N°{{ $commande->id }}</h2>

    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach(json_decode($commande->produit, true) as $produit)
                <tr>
                    <td>{{ $produit['name'] }}</td>
                    <td>{{ $produit['quantity'] }}</td>
                    <td>{{ $produit['price'] }} FCFA</td>
                    <td>{{ $produit['quantity'] * $produit['price'] }} FCFA</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="total">
        Montant Total : {{ $commande->total }} FCFA
    </div>

    <div id="boutique-info">
        <h3>Informations de la Boutique</h3>
        <p><strong>Nom :</strong> {{ $commande->boutique->name }}</p>
        <p><strong>Ville :</strong> {{ $commande->boutique->city ?? 'N/A' }}</p>
        <p><strong>Téléphone :</strong> {{ $commande->boutique->phone ?? 'N/A' }}</p>
    </div>
</body>
</html>

