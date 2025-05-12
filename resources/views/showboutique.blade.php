@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <input type="hidden" id="boutique_id" value="{{ $boutique->id }}">

                        <h1 class="fw-bold text-danger">{{ $boutique->name }}</h1>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('storage/' . $boutique->image) }}" alt="{{ $boutique->name }}">

                            </div>
                            <div class="col-md-6">
                                <p><strong>Description:</strong> {{ $boutique->description }}</p>
                                <p><strong>Propriétaire:</strong> {{ $boutique->owner_name }}</p>
                                {{-- <p><strong>Téléphone:</strong> {{ $boutique->phone }}</p> --}}
                                <p><strong>Type d'entreprise:</strong> {{ ucfirst($boutique->business_type) }}</p>
                                <p><strong>Ville:</strong> {{ $boutique->city }}</p>

                                {{-- <p><strong>Adresse:</strong> {{ $boutique->location }}</p> --}}
                            </div>
                            <div class="col-md-12 py-2ph">
                                <h3 class="text-center"><strong> Localisation Google Maps</strong></h3>
                                <iframe class="position-relative rounded w-100 h-90" src="{{ $boutique->location }}"
                                    frameborder="0" style="min-height: 350px; border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
                            </div>

                            @if ($boutique->video)
                                <div class="col-md-12">
                                    <p><strong>Vidéo:</strong></p>
                                    <iframe width="100%" height="315" src="{{ $boutique->video }}" frameborder="0"
                                        allowfullscreen></iframe>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produits de la boutique -->
        <div class="all-product-grid">
            <div class="container">
                <div class="product-list-view">
                    <div class="row">
                        <a href="#" class="category_drop hover-btn" data-bs-toggle="modal"
                            data-bs-target="#category_model" title="Categories">
                            <i class="uil uil-apps"></i>
                            <span class="cate__icon">Sélectionner la Catégorie</span>
                        </a>
                        <div class="header-cate-model main-gambo-model modal fade" id="category_model" tabindex="-1"
                            role="dialog" aria-modal="false">
                            <div class="modal-dialog category-area" role="document">
                                <div class="category-area-inner">
                                    <div class="modal-header">
                                        <button type="button" class="close btn-close" data-dismiss="modal"
                                            aria-label="Close">
                                            <i class="uil uil-multiply"></i>
                                        </button>
                                    </div>
                                    <div class="category-model-content modal-content">
                                        <div class="cate-header">
                                            <h4>Select Category</h4>
                                        </div>
                                        <ul class="category-by-cat">
                                            {{-- Catégories classiques --}}
                                            <li>
                                                <a href="#" class="single-cat-item category-filter"
                                                    data-category="alimentation">
                                                    <div class="icon">
                                                        <i class="fa fa-tag"></i> {{-- Icône générique --}}
                                                    </div>
                                                    <div class="text"> Alimentation </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="single-cat-item category-filter"
                                                    data-category="pharmacopée">
                                                    <div class="icon">
                                                        <i class="fa fa-tag"></i> {{-- Icône générique --}}
                                                    </div>
                                                    <div class="text"> Pharmacopée </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="single-cat-item category-filter"
                                                    data-category="cosmétique">
                                                    <div class="icon">
                                                        <i class="fa fa-tag"></i> {{-- Icône générique --}}
                                                    </div>
                                                    <div class="text"> Cosmétique </div>
                                                </a>
                                            </li>

                                            {{-- Catégories dynamiques --}}
                                            @foreach ($categoriesDynamiques as $categorie)
                                                <li>
                                                    <a href="#" class="single-cat-item category-filter"
                                                        data-category="{{ Str::slug($categorie->name) }}">
                                                        <div class="icon">
                                                            <i class="fa fa-tag"></i> {{-- Icône générique --}}
                                                        </div>
                                                        <div class="text"> {{ $categorie->name }} </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
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
                        @foreach ($produits as $produit)
                            <div class="col-lg-3 col-md-6 product-card" data-name="{{ strtolower($produit->name) }}">

                                <div class="product-item mb-30">
                                    <img src="{{ asset('storage/' . $produit->image_url) }}"
                                        class="card-img-top product-image" alt="{{ $produit->name }}">
                                    <div class="product-absolute-options">
                                        @if ($produit->discount > 0)
                                            <span class="offer-badge-1">{{ $produit->discount }}% off</span>
                                        @endif
                                        <span class="like-icon" title="wishlist"></span>
                                    </div>
                                    <div class="product-text-dt">
                                        <p>Available<span>{{ $produit->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span>
                                        </p>
                                        <h4>{{ $produit->name }}</h4>
                                        <div class="product-price">{{ $produit->price }} F CFA</div>
                                        <button class="btn btn-success open-modal" data-id="{{ $produit->id }}"
                                            data-name="{{ $produit->name }}" data-price="{{ $produit->price }}"
                                            data-description="{{ $produit->description }}"
                                            data-image="{{ asset('storage/' . $produit->image_url) }}">
                                            Voir détails
                                        </button>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="0"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel"
            aria-hidden="true">
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
                                <p id="modalProductDescription" style="overflow-y: auto; max-height: 300px;"></p>
                                <p><strong>Prix :</strong> <span id="modalProductPrice"></span> F CFA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
