<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Commande</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 300;
        }
        
        .header .icon {
            font-size: 48px;
            margin-bottom: 15px;
        }
        
        .content {
            padding: 40px 30px;
        }
        
        .greeting {
            font-size: 18px;
            margin-bottom: 30px;
            color: #555;
        }
        
        .order-info {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 5px solid #667eea;
        }
        
        .order-number {
            font-size: 24px;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 15px;
        }
        
        .boutique-info {
            background-color: #e8f4fd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            border-left: 4px solid #17a2b8;
        }
        
        .boutique-name {
            font-size: 20px;
            font-weight: bold;
            color: #17a2b8;
            margin-bottom: 10px;
        }
        
        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .products-table th {
            background-color: #667eea;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }
        
        .products-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }
        
        .products-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        .total-section {
            background-color: #28a745;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: right;
            margin-top: 20px;
        }
        
        .total-amount {
            font-size: 24px;
            font-weight: bold;
        }
        
        .customer-info {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        
        .customer-info h3 {
            color: #856404;
            margin-top: 0;
            margin-bottom: 15px;
        }
        
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 30px;
            font-size: 14px;
        }
        
        .action-button {
            display: inline-block;
            background-color: #667eea;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 25px;
            margin: 20px 0;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        
        .action-button:hover {
            background-color: #5a6fd8;
        }
        
        .status-badge {
            display: inline-block;
            background-color: #ffc107;
            color: #212529;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        @media only screen and (max-width: 600px) {
            .container {
                margin: 0;
                box-shadow: none;
            }
            
            .content {
                padding: 20px 15px;
            }
            
            .header {
                padding: 20px;
            }
            
            .header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="icon">🛒</div>
            <h1>Nouvelle Commande Reçue</h1>
            <p>Une nouvelle commande a été passée sur votre boutique</p>
        </div>
        
        <div class="content">
            <div class="greeting">
                Bonjour <strong>{{ $adminName }}</strong>,<br>
                Une nouvelle commande vient d'être passée sur votre boutique.
            </div>
            
            <div class="order-info">
                <div class="order-number">
                    Commande #{{ $commande->id }}
                </div>
                <div class="status-badge">
                    {{ ucfirst($commande->etat) }}
                </div>
                <p><strong>Date de commande :</strong> {{ $commande->created_at->format('d/m/Y à H:i') }}</p>
            </div>
            
            <div class="boutique-info">
                <div class="boutique-name">{{ $boutique->name }}</div>
                <p><strong>Ville :</strong> {{ $boutique->city }}</p>
                <p><strong>Type d'entreprise :</strong> {{ ucfirst($boutique->business_type) }}</p>
            </div>
            
            <div class="customer-info">
                <h3>📞 Informations Client</h3>
                <p><strong>Numéro de téléphone :</strong> {{ $commande->numero_telephone }}</p>
            </div>
            
            <h3>🛍️ Produits Commandés</h3>
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produits as $produit)
                    <tr>
                        <td><strong>{{ $produit['name'] }}</strong></td>
                        <td>{{ $produit['quantity'] }}</td>
                        <td>{{ number_format($produit['price'], 0, ',', ' ') }} F CFA</td>
                        <td><strong>{{ number_format($produit['price'] * $produit['quantity'], 0, ',', ' ') }} F CFA</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="total-section">
                <div class="total-amount">
                    Total : {{ number_format($commande->total, 0, ',', ' ') }} F CFA
                </div>
                <p>Quantité totale : {{ $commande->quantite }} article(s)</p>
            </div>
            
            <div style="text-align: center; margin-top: 30px;">
                <a href="{{ url('/admin/commandes/show?boutique_id=' . $boutique->id) }}" class="action-button">
                    Voir les détails dans l'administration
                </a>
            </div>
            
            <div style="margin-top: 30px; padding: 20px; background-color: #f8f9fa; border-radius: 8px;">
                <h4>📋 Actions recommandées :</h4>
                <ul style="margin: 10px 0; padding-left: 20px;">
                    <li>Vérifier la disponibilité des produits</li>
                    <li>Contacter le client pour confirmer la commande</li>
                    <li>Mettre à jour le statut de la commande</li>
                    <li>Préparer la commande pour la livraison</li>
                </ul>
            </div>
        </div>
        
        <div class="footer">
            <p>Cet email a été envoyé automatiquement par le système de gestion de commandes.</p>
            <p>© {{ date('Y') }} - Tous droits réservés</p>
        </div>
    </div>
</body>
</html> 