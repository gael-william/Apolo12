@extends('layouts.app')
@section('content')
<br><br><br><br><br><br><br><br>


<div class="container">
    <div class="grid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-sm-12">
                <div class="card p-3" id="commandepdf">

                    <div id="header">
                        <h2 class="alert alert-success" style="white-space: normal;">
                            Commande N°: {{ $commande->id }} / Boutique N°: {{ $commande->boutique->id }}
                        </h2>

                        <strong>Téléphone:</strong> {{ $commande->numero_telephone }} <br>

                        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                            <thead style="border: 1px solid #ddd;">
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    <th>Qte</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produits as $p)
                                    <tr>
                                        <td>{{ $p['name'] }}</td>
                                        <td>{{ $p['price'] }} FCFA</td>
                                        <td>{{ $p['quantity'] }}</td>
                                        <td>{{ $p['price'] * $p['quantity'] }} FCFA</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div id="total" class="mt-3">
                            <strong>Montant Total:</strong> {{ $commande->total }} FCFA
                        </div>
                    </div>

                    <div id="boutique-info" class="mt-4">
                        <h3 class="alert alert-success">Informations de la Boutique</h3>
                        <p><strong>Nom:</strong> {{ $commande->boutique->name }}</p>
                        <p><strong>Ville:</strong> {{ $commande->boutique->city ?? '-' }}</p>
                        <p><strong>Téléphone:</strong> {{ $commande->boutique->phone ?? '-' }}</p>
                    </div>

                    <div class="card-footer mt-3">
                        <small><i> Commande effectuée le {{ $commande->created_at }}</i></small>
                    </div>
                </div>

                <div class="card-footer mt-3">
                    {{-- <a class="btn btn-success" href="{{ route('boutiques.show', $commande->boutique->id) }}">Retour à la boutique</a> --}}
                    <button id="button" class="btn btn-info">Télécharger <i class="fa fa-download"></i></button>
                </div>
                <br><br>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</div>

<style>
    .alert-success {
        background-color: black !important;
        color: white !important;
        font-size: 15px !important;
        text-align: center;
        word-wrap: break-word;
        padding: 5px;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script>
    let button = document.getElementById("button");
    let makepdf = document.getElementById("commandepdf");

    button.addEventListener("click", function () {
        const opt = {
            margin: [0, 0, 0, 0],
            filename: 'commande.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: [80, 250], orientation: 'portrait' }
        };
        html2pdf().from(makepdf).set(opt).save();
    });
</script>
@endsection
