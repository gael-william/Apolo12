@extends('layouts.app')
@section('content')
<!-- Body Start -->

<div class="wrapper">
    <div class="gambo-Breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search120">
                        <div class="header_search position-relative">
                            <input id="searchInput" class="prompt srch10" type="text"
                                placeholder="Rechercher vos produits..">
                            <i class="uil uil-search s-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="all-product-grid">
        <div class="container">

            <div class="product-list-view">
                <div class="row">
                    @foreach ($produits as $produit)
                    <div class="col-lg-3 col-md-6 product-card" data-name="{{ strtolower($produit->name) }}">
                        <div class="product-item mb-30">
                            {{-- <a href="{{ route('products.show', $produit->id) }}" class="product-img"> --}}
                            <img src="{{ asset('storage/' . $produit->image_url) }}"
                                class="card-img-top product-image" alt="{{ $produit->name }}">
                 <div class="product-absolute-options">
                                            <span class="offer-badge-1">New</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                        </a>
                                        <div class="product-text-dt">
                                            <!--<p>Stock<span>{{ $produit->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span>-->
                                            </p>
                                            <a href="{{ route('boutique.show', ['id' => $produit->boutique->id]) }}"
                                                class="btn btn-sm d-flex align-items-center justify-content-center"
                                                style="background-color: #f57c00; color: white; border-radius: 10px; font-size: 0.78rem; padding: 2px 8px;">
                                                <i class="fas fa-store me-1"></i> Visiter la boutique
                                            </a>

                                <h4>{{ $produit->name }}</h4>
                                <div class="product-price">{{ $produit->price }} F CFA</div>
                                <button class="btn btn-success open-modal" data-id="{{ $produit->id }}"
                                    data-name="{{ $produit->name }}" data-price="{{ $produit->price }}"
                                    data-description="{{ $produit->description }}"
                                    data-image="{{ asset('storage/' . $produit->image_url) }}">
                                    Voir détails
                                </button>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Détails du produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <img id="modalProductImage" src="" class="img-fluid">
                    </div>
                    <div class="col-lg-8">
                        <h2 id="modalProductName"></h2>
                        <p id="modalProductDescription"></p>
                        <p><strong>Prix :</strong> <span id="modalProductPrice"></span> F CFA</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection