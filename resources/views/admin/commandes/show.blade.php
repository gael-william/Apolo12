@extends('admin.layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Filtrage par date -->
                    <form method="GET" action="{{ route('admin.commandes.show') }}" class="mb-3">
                        <input type="hidden" name="boutique_id" value="{{ request('boutique_id') }}">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="start_date" class="form-label">Date de début :</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="end_date" class="form-label">Date de fin :</label>
                                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Filtrer</button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('admin.boutiques.show', $boutique->id) }}" class="btn btn-danger btn-sm">Fermer</a>


                    <!-- Liste des commandes -->
                    <h2 class="card-header text-center">Liste des Commandes de la boutique {{ $boutique->name }}</h2>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th>Date</th>
                                        <th>Nom Client</th>
                                        <th>Numéro de Téléphone</th>
                                        <th>État</th>
                                        <th>Total (FCFA)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($commandes->where('boutique_id', $boutique->id) as $commande)
                                        <tr>
                                            {{-- <td>{{ $commande->id }}</td> --}}
                                            <td>{{ $commande->created_at }}</td>
                                            <td>{{ $commande->nom_client }}</td>
                                            <td>{{ $commande->numero_telephone }}</td>
                                            <td>
                                                @if ($commande->etat === 'validée')
                                                    <i class="fa fa-check-circle text-success"></i> Validée
                                                @elseif($commande->etat === 'en cours')
                                                    <i class="fa fa-sync-alt text-warning"></i> En Cours
                                                @else
                                                    <i class="fa fa-clock text-muted"></i> En Attente
                                                @endif
                                            </td>
                                            <td>{{ $commande->total }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <!-- Valider la commande -->
                                                    <form method="POST" action="{{ route('admin.commandes.updateEtat', $commande->id) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="etat" value="validée">
                                                        <button type="submit" class="btn btn-success btn-sm me-2" title="Valider">
                                                            <i class="fa fa-check-circle"></i>
                                                        </button>
                                                    </form>

                                                    <!-- Mettre la commande en cours -->
                                                    <form method="POST" action="{{ route('admin.commandes.updateEtat', $commande->id) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="etat" value="en cours">
                                                        <button type="submit" class="btn btn-warning btn-sm me-2" title="En cours">
                                                            <i class="fa fa-sync-alt"></i>
                                                        </button>
                                                    </form>

                                                    <!-- Voir les détails -->
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal{{ $commande->id }}"
                                                        title="Voir les détails">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Détails des commandes dans modals -->
                @foreach ($commandes as $commande)
                    <div class="modal fade" id="modal{{ $commande->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $commande->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $commande->id }}">Détails de la Commande</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                </div>
                                <div class="modal-body">
                                    <h4><strong>Montant total :</strong> {{ $commande->total }} FCFA</h4>
                                    <h4><strong>Date :</strong> {{ $commande->created_at }}</h4>
                                    <h4><strong>Nom du client :</strong> {{ $commande->nom_client }}</h4>
                                    <h4><strong>Contact :</strong> {{ $commande->numero_telephone }}</h4>
                                    <h4><strong>Produits commandés :</strong></h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Produit</th>
                                                    <th>Quantité</th>
                                                    <th>Prix unitaire</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (json_decode($commande->produit, true) as $produit)
                                                    <tr>
                                                        <td>{{ $produit['name'] }}</td>
                                                        <td>{{ $produit['quantity'] }}</td>
                                                        <td>{{ $produit['price'] }} FCFA</td>
                                                        <td>{{ $produit['quantity'] * $produit['price'] }} FCFA</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <a href="{{ route('commandes.pdf', $commande->id) }}" class="btn btn-success" target="_blank">Télécharger en PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
