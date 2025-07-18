@extends('layouts.app')
@section('content')
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2eafc 100%);
        }

        .wrapper {
            padding: 30px 0;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(60, 72, 88, 0.12);
            background: #fff;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(90deg, #ff6a00 0%, #ee0979 100%);
            color: #fff;
            border-bottom: none;
            padding: 30px 40px;
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 90px;
            border-radius: 20px 20px 0 0;
        }

        .card-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .card-header .fa-store {
            font-size: 2.2rem;
            color: #fff;
            background: #ee0979;
            border-radius: 50%;
            padding: 10px;
            box-shadow: 0 2px 8px rgba(238, 9, 121, 0.2);
        }

        .card-body {
            padding: 40px;
        }

        .product-list-view {
            margin-top: 40px;
        }

        .product-item {
            border-radius: 18px;
            box-shadow: 0 4px 16px rgba(60, 72, 88, 0.10);
            background: #fff;
            transition: transform 0.2s;
            position: relative;
            overflow: hidden;
        }

        .product-item:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 12px 32px rgba(238, 9, 121, 0.12);
        }

        .product-image {
            border-radius: 18px 18px 0 0;
            height: 180px;
            object-fit: cover;
            width: 100%;
        }

        .product-absolute-options {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .offer-badge-1 {
            background: linear-gradient(90deg, #ff6a00 0%, #ee0979 100%);
            color: #fff;
            padding: 6px 14px;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(238, 9, 121, 0.12);
        }

        .like-icon {
            font-size: 1.5rem;
            color: #ee0979;
            cursor: pointer;
            transition: color 0.2s;
        }

        .like-icon:before {
            content: "\f004";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
        }

        .product-text-dt {
            padding: 18px 16px 16px 16px;
            text-align: center;
        }

        .product-text-dt h4 {
            font-size: 1.2rem;
            font-weight: 700;
            margin: 10px 0 6px 0;
            color: #ee0979;
        }

        .product-price {
            font-size: 1.1rem;
            font-weight: 600;
            color: #ff6a00;
            margin-bottom: 10px;
        }

        .qty-cart {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .quantity input[type="number"] {
            width: 50px;
            text-align: center;
            border-radius: 8px;
            border: 1px solid #ee0979;
            margin: 0 5px;
        }

        .minus-btn,
        .plus-btn {
            background: #ee0979;
            color: #fff;
            border: none;
            border-radius: 8px;
            width: 28px;
            height: 28px;
            font-size: 1.2rem;
            cursor: pointer;
        }

        .cart-icon i {
            font-size: 1.5rem;
            color: #ff6a00;
        }

        .category_drop {
            background: linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
            color: #fff;
            padding: 12px 28px;
            border-radius: 16px;
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 2px 8px rgba(238, 9, 121, 0.12);
            transition: background 0.2s;
        }

        .category_drop:hover {
            background: linear-gradient(90deg, #ff6a00 0%, #ee0979 100%);
        }

        .cate__icon {
            font-size: 1rem;
        }

        .search120 {
            margin-bottom: 20px;
        }

        .header_search input {
            border-radius: 12px;
            border: 1px solid #ee0979;
            padding: 10px 40px 10px 16px;
            font-size: 1rem;
            width: 100%;
            box-shadow: 0 2px 8px rgba(238, 9, 121, 0.08);
        }

        .header_search .s-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #ee0979;
            font-size: 1.3rem;
        }

        .category-area-inner {
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 8px 32px rgba(60, 72, 88, 0.12);
            padding: 24px;
        }

        .category-by-cat li {
            margin-bottom: 12px;
        }

        .single-cat-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 18px;
            border-radius: 12px;
            background: #f8fafc;
            transition: background 0.2s;
            font-weight: 500;
            color: #333;
        }

        .single-cat-item:hover {
            background: linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
            color: #fff;
        }

        .single-cat-item .icon i {
            font-size: 1.3rem;
            color: #ee0979;
            background: #fff;
            border-radius: 50%;
            padding: 6px;
            box-shadow: 0 2px 8px rgba(238, 9, 121, 0.12);
        }

        .single-cat-item:hover .icon i {
            color: #fff;
            background: #ee0979;
        }

        /* Modal */
        #productModal .modal-content {
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(60, 72, 88, 0.12);
            padding: 24px;
        }

        #productModal .modal-header {
            border-bottom: none;
            background: linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
            color: #fff;
            border-radius: 18px 18px 0 0;
            padding: 20px 24px;
        }

        #productModal .modal-title {
            font-size: 1.6rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        #productModal .btn-close {
            background: #fff;
            color: #ee0979;
            border-radius: 50%;
            padding: 6px;
            font-size: 1.2rem;
        }

        #modalProductImage {
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(238, 9, 121, 0.12);
            max-height: 260px;
            object-fit: cover;
        }

        /* Google Maps */
        .map-section {
            margin: 40px 0 0 0;
            background: #f8fafc;
            border-radius: 18px;
            box-shadow: 0 4px 16px rgba(60, 72, 88, 0.10);
            padding: 24px;
        }

        .map-section h3 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #ee0979;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .map-section h3 .fa-map-marker-alt {
            font-size: 1.5rem;
            color: #ff6a00;
        }

        .map-section iframe {
            border-radius: 12px;
            min-height: 350px;
            width: 100%;
            border: none;
            box-shadow: 0 2px 8px rgba(238, 9, 121, 0.08);
        }

        /* Video */
        .video-section {
            margin: 32px 0 0 0;
            background: #f8fafc;
            border-radius: 18px;
            box-shadow: 0 4px 16px rgba(60, 72, 88, 0.10);
            padding: 24px;
        }

        .video-section p {
            font-weight: 600;
            color: #ee0979;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .video-section p .fa-video {
            font-size: 1.2rem;
            color: #ff6a00;
        }

        .video-section iframe {
            border-radius: 12px;
            width: 100%;
            min-height: 315px;
            box-shadow: 0 2px 8px rgba(238, 9, 121, 0.08);
        }

        /* Responsive */
        @media (max-width: 768px) {

            .card-header,
            .card-body {
                padding: 18px;
            }

            .product-item {
                margin-bottom: 18px;
            }

            .map-section,
            .video-section {
                padding: 12px;
            }
        }
    </style>
    <div class="wrapper">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <input type="hidden" id="boutique_id" value="{{ $boutique->id }}">
                        <i class="fas fa-store"></i>
                        <h1>{{ $boutique->name }}</h1>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-5 text-center">
                                <img src="{{ asset('storage/' . $boutique->image) }}" alt="{{ $boutique->name }}"
                                    class="img-fluid rounded shadow-sm" style="max-height: 260px;">
                            </div>
                            <div class="col-md-7">
                                <p><i class="fas fa-align-left text-warning"></i> <strong>Description:</strong>
                                    {{ $boutique->description }}</p>
                                <p><i class="fas fa-user-tie text-primary"></i> <strong>Propriétaire:</strong>
                                    {{ $boutique->owner_name }}</p>
                                <p><i class="fas fa-industry text-success"></i> <strong>Type d'entreprise:</strong>
                                    {{ ucfirst($boutique->business_type) }}</p>
                                <p><i class="fas fa-city text-info"></i> <strong>Ville:</strong> {{ $boutique->city }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 map-section mt-4">
                                <h3><i class="fas fa-map-marker-alt"></i> Localisation Google Maps</h3>
                                <iframe src="{{ $boutique->location }}" allowfullscreen="" aria-hidden="false"
                                    tabindex="0"></iframe>
                            </div>
                        </div>
                        @if ($boutique->video)
                            <div class="row">
                                <div class="col-12 video-section mt-4">
                                    <p><i class="fas fa-video"></i> Vidéo:</p>
                                    <iframe src="{{ $boutique->video }}" allowfullscreen></iframe>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Produits de la boutique -->
        <div class="all-product-grid">
            <div class="container">
                <div class="product-list-view">
                    <div class="row justify-content-between align-items-center mb-3">
                        <div class="col-md-6">
                            <a href="#" class="category_drop hover-btn" data-bs-toggle="modal"
                                data-bs-target="#category_model" title="Categories">
                                <i class="fas fa-th-large"></i>
                                <span class="cate__icon">Sélectionner la Catégorie</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <div class="search120">
                                <div class="header_search position-relative">
                                    <input id="searchInput" class="prompt srch10" type="text"
                                        placeholder="Rechercher vos produits..">
                                    <i class="uil uil-search s-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Category Model Start -->
                    <div class="header-cate-model main-gambo-model modal fade" id="category_model" tabindex="-1"
                        role="dialog" aria-modal="false">
                        <div class="modal-dialog category-area" role="document">
                            <div class="category-area-inner">
                                <div class="modal-header">
                                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                                        <i class="uil uil-multiply"></i>
                                    </button>
                                </div>
                                <div class="category-model-content modal-content">
                                    <div class="cate-header">
                                        <h4><i class="fas fa-tags text-warning"></i> Sélectionner une catégorie</h4>
                                    </div>
                                    <ul class="category-by-cat">
                                        {{-- Catégories classiques --}}
                                        <li>
                                            <a href="#" class="single-cat-item category-filter"
                                                data-category="alimentation">
                                                <div class="icon">
                                                    <i class="fas fa-utensils"></i>
                                                </div>
                                                <div class="text"> Alimentation </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="single-cat-item category-filter"
                                                data-category="pharmacopée">
                                                <div class="icon">
                                                    <i class="fas fa-leaf"></i>
                                                </div>
                                                <div class="text"> Pharmacopée </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="single-cat-item category-filter"
                                                data-category="cosmétique">
                                                <div class="icon">
                                                    <i class="fas fa-magic"></i>
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
                                                        <i class="fas fa-tag"></i>
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
                    <!-- Category Model End -->
                    <div class="row">
                        @foreach ($produits as $produit)
                            <div class="col-lg-3 col-md-6 product-item-container product-card mb-4"
                                data-category="{{ strtolower($produit->category) }}"
                                data-name="{{ strtolower($produit->name) }}">
                                <div class="product-item">
                                    <img src="{{ asset('storage/' . $produit->image_url) }}"
                                        class="card-img-top product-image" alt="{{ $produit->name }}">
                                    <div class="product-absolute-options">
                                        @if ($produit->discount > 0)
                                            <span class="offer-badge-1"><i class="fas fa-bolt"></i>
                                                {{ $produit->discount }}% off</span>
                                        @endif
                                        <span class="like-icon" title="wishlist"></span>
                                    </div>
                                    <div class="product-text-dt">
                                        <p>
                                            <span>
                                                @if ($produit->stock > 0)
                                                    <i class="fas fa-check-circle text-success"></i> Disponible
                                                @else
                                                    <i class="fas fa-times-circle text-danger"></i> Stock Epuisé
                                                @endif
                                            </span>
                                        </p>
                                        <h4>{{ $produit->name }}</h4>
                                        <div class="product-price"><i class="fas fa-money-bill-wave"></i>
                                            {{ $produit->price }} F CFA</div>
                                        <button class="btn btn-success open-modal" data-id="{{ $produit->id }}"
                                            data-name="{{ $produit->name }}" data-price="{{ $produit->price }}"
                                            data-description="{{ $produit->description }}"
                                            data-image="{{ asset('storage/' . $produit->image_url) }}">
                                            <i class="fas fa-eye"></i> Voir détails
                                        </button>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="0"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="fas fa-shopping-cart"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel"><i class="fas fa-info-circle"></i> Détails du
                            produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-center">
                            <div class="col-lg-4 text-center">
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
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script>
        // Modal logic
        document.querySelectorAll('.open-modal').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.getElementById('modalProductImage').src = btn.getAttribute('data-image');
                document.getElementById('modalProductName').textContent = btn.getAttribute('data-name');
                document.getElementById('modalProductDescription').textContent = btn.getAttribute(
                    'data-description');
                document.getElementById('modalProductPrice').textContent = btn.getAttribute('data-price');
                var modal = new bootstrap.Modal(document.getElementById('productModal'));
                modal.show();
            });
        });

        // Category filter
        document.querySelectorAll('.category-filter').forEach(function(cat) {
            cat.addEventListener('click', function(e) {
                e.preventDefault();
                var category = cat.getAttribute('data-category');
                document.querySelectorAll('.product-card').forEach(function(card) {
                    if (category === '' || card.getAttribute('data-category') === category) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
                var modal = bootstrap.Modal.getInstance(document.getElementById('category_model'));
                if (modal) modal.hide();
            });
        });

        // Search filter
        document.getElementById('searchInput').addEventListener('input', function() {
            var val = this.value.toLowerCase();
            document.querySelectorAll('.product-card').forEach(function(card) {
                var name = card.getAttribute('data-name');
                if (name.includes(val)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
@endsection
