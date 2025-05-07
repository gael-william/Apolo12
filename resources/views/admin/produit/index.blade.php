@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Produits de la boutique</h3>
                                <div>
                                    <a href="{{ route('admin.boutiques.products.create', $boutique->id) }}"
                                        class="btn btn-info btn-sm">
                                        Ajouter un produit <i class="fa fa-plus"></i>
                                    </a>
                                    <a href="{{ route('admin.boutiques.show', $boutique->id) }}"
                                        class="btn btn-danger btn-sm">Fermer</a>
                                </div>
                            </div>

                            <div class="card-body">
                                @if ($products->count() > 0)
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-lg-2 col-md-4 col-sm-3 mb-4">
                                                <div class="card product-card shadow-sm">
                                                    <img src="{{ asset('storage/' . $product->image_url) }}"
                                                        class="card-img-top product-image" alt="{{ $product->name }}">
                                                    <div class="card-body text-center">
                                                        <h5 class="card-title">{{ $product->name }}</h5>
                                                        <p class="text-muted">{{ $product->category }}</p>
                                                        <h5 class="text-primary font-weight-bold">
                                                            {{ number_format($product->price, 0, ',', ' ') }} F</h5>
                                                        <button class="btn btn-sm btn-primary open-modal"
                                                            data-bs-toggle="modal" data-bs-target="#productDetailModal"
                                                            data-name="{{ $product->name }}"
                                                            data-price="{{ number_format($product->price, 0, ',', ' ') }} F"
                                                            data-description="{{ $product->description }}"
                                                            data-image="{{ asset('storage/' . $product->image_url) }}">
                                                            Voir détail
                                                        </button>
                                                        <form action="{{ route('admin.products.toggleStock', $product->id) }}" method="POST" class="d-inline toggle-stock-form">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-sm {{ $product->stock > 0 ? 'btn-warning' : 'btn-success' }}">
                                                                {{ $product->stock > 0 ? 'Mettre Out Stock' : 'Mettre In Stock' }}
                                                            </button>
                                                        </form>
                                                        
                                                        <div class="d-flex justify-content-center mt-2">
                                                            <a href="{{ route('admin.boutiques.products.edit', [$boutique->id, $product->id]) }}"
                                                                class="btn btn-sm btn-info d-inline">Modifier</a>
                                                            <form
                                                                action="{{ route('admin.boutiques.products.destroy', [$boutique->id, $product->id]) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-center">Aucun produit ajouté.</p>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Détail Produit -->
            <div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="productDetailModalLabel">Détail du produit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <img id="modalProductImage" src="" class="img-fluid mb-3" style="max-height: 300px;"
                                alt="">
                            <h4 id="modalProductName" class="fw-bold"></h4>
                            <p id="modalProductDescription" style="overflow-y: auto; max-height: 300px;"></p>
                            <h5 id="modalProductPrice" class="text-primary fw-bold"></h5>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
