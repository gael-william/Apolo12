@extends('layouts.app')
@section('content')
<style>
    /* Couleurs personnalisées */
    .bg-gradient-primary {
        background: linear-gradient(90deg, #ff6a00 0%, #ee0979 100%);
    }

    /* Nouveau style boutique - en-tête moderne */
    .boutique-card {
        border-radius: 14px;
        overflow: hidden;
        transition: transform .25s ease, box-shadow .25s ease;
        box-shadow: 0 6px 22px rgba(39, 44, 64, 0.08);
    }
    .boutique-card:hover { transform: translateY(-6px); box-shadow: 0 18px 40px rgba(39,44,64,0.12); }

    .boutique-header {
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 18px;
        background: linear-gradient(90deg, rgba(255,106,0,0.06), rgba(238,9,121,0.03));
    }

    .boutique-avatar {
        width: 96px; height: 96px; border-radius: 18px; overflow: hidden;
        flex-shrink: 0; border: 4px solid #fff; box-shadow: 0 6px 18px rgba(0,0,0,0.06);
    }
    .boutique-avatar img { width: 100%; height: 100%; object-fit: cover; display:block; }

    .boutique-title { font-size: 1.25rem; margin: 0; font-weight:700; color:#1f2d3d; }
    .boutique-sub { font-size: .9rem; color:#6b7280; margin-top:4px; }

    .boutique-stats { display:flex; gap:12px; align-items:center; margin-left:8px; }
    .stat-badge { background:#fff; padding:8px 10px; border-radius:10px; display:inline-flex; align-items:center; gap:8px; font-size:.85rem; color:#374151; box-shadow:0 4px 14px rgba(15,23,42,0.04); }
    .stat-badge i { color:#f59e0b; }

    .boutique-actions { margin-left:auto; display:flex; gap:10px; }
    .btn-ghost { background:transparent; border:1px solid rgba(15,23,42,0.05); color:#111827; padding:8px 12px; border-radius:10px; }
    .btn-primary-solid { background:#f57c00; color:#fff; border-radius:10px; padding:8px 14px; border:none; }

    /* Small screen adjustments */
    @media (max-width: 768px) {
        .boutique-header { flex-direction:column; align-items:flex-start; gap:12px; }
        .boutique-actions { width:100%; justify-content:space-between; }
        .boutique-avatar { width:72px; height:72px; }
    }

    /* Reuse some existing helpers */
    .info-item { transition: transform 0.18s ease, box-shadow 0.18s ease; }
    .info-item:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(15,23,42,0.06); }

</style>

<div class="wrapper">
  <div class="row mt-1">
    <div class="col-lg-10 mx-auto">
        <div class="boutique-card border-0 bg-white">
            <input type="hidden" id="boutique_id" value="{{ $boutique->id }}">
            <div class="boutique-header">
                <div class="boutique-avatar">
                    <img src="{{ asset('storage/' . $boutique->image) }}" alt="{{ $boutique->name }}">
                </div>

                <div>
                    <h2 class="boutique-title">{{ $boutique->name }}</h2>
                    <div class="d-flex align-items-center mt-1">
                        <div class="boutique-sub">{{ Str::limit($boutique->description, 110) }}</div>
                        <div class="boutique-stats">
                            <div class="stat-badge"><i class="fas fa-shopping-bag"></i> {{ $boutique->products->count() ?? 0 }} produits</div>
                        </div>
                    </div>
                </div>

                <div class="boutique-actions">
                    <a href="https://wa.me/+22602101008" target="_blank" class="btn-ghost">Contact</a>
                    <button class="btn-primary-solid" onclick="document.getElementById('searchInput')?.focus()">Voir produits</button>
                </div>
            </div>

            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="image-container rounded-lg overflow-hidden shadow-sm">
                            <img src="{{ asset('storage/' . $boutique->image) }}" alt="{{ $boutique->name }}" class="img-fluid" style="width:100%; height:320px; object-fit:cover; border-radius:10px;">
                        </div>
                    </div>
                    <div class="col-md-7 mt-3 mt-md-0">
                        <div class="info-item mb-3 p-3 bg-light rounded-lg">
                            <small class="text-muted text-uppercase">Description</small>
                            <p class="text-dark mb-0 mt-2">{{ $boutique->description }}</p>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="info-item mb-3 p-3 bg-light rounded-lg">
                                    <small class="text-muted text-uppercase">Propriétaire</small>
                                    <p class="mb-0 mt-1"><strong>{{ $boutique->owner_name }}</strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="info-item mb-3 p-3 bg-light rounded-lg">
                                    <small class="text-muted text-uppercase">Ville</small>
                                    <p class="mb-0 mt-1">{{ $boutique->city }}</p>
                                </div>
                            </div>
                        </div>

                        @if ($boutique->video)
                        <div class="mt-2">
                            <a href="#" class="text-decoration-none">Regarder la vidéo de présentation</a>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 map-section">
                        <div class="section-header d-flex align-items-center mb-3">
                            <h3 class="h5 mb-0 font-weight-bold text-dark">Localisation</h3>
                        </div>
                        <div class="map-container rounded-lg overflow-hidden shadow-sm">
                            <iframe src="{{ $boutique->location }}" allowfullscreen aria-hidden="false" tabindex="0" class="w-100" style="height: 300px; border: none;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
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
                        <a style="background-color: #f57c00;" href="#" class="category_drop hover-btn" data-bs-toggle="modal"
                            data-bs-target="#category_model" title="Categories">
                            <i class="fas fa-th-large"></i>
                            <span class="cate__icon" >Sélectionner la Catégorie</span>
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
                    <div class="col-lg-3 col-md-6 col-6 product-item-container product-card mb-4" data-category="{{ strtolower($produit->category) }}" data-name="{{ strtolower($produit->name) }}" data-boutique="{{ $boutique->id }}">
                        <div class="product-item mb-30">
                            <img src="{{ asset('storage/' . $produit->image_url) }}" class="card-img-top product-image" alt="{{ $produit->name }}">
                            <div class="product-absolute-options">
                                @if ($produit->discount > 0)
                                <span class="offer-badge-1"><i class="fas fa-bolt"></i> {{ $produit->discount }}% off</span>
                                @endif
                                <span class="like-icon" title="wishlist"></span>
                            </div>
                            <div class="product-text-dt">
                                <!-- <p>
                                        <span>
                                            @if ($produit->stock > 0)
                                                <i class="fas fa-check-circle text-success"></i> Disponible
                                            @else
                                                <i class="fas fa-times-circle text-danger"></i> Stock Epuisé
                                            @endif
                                        </span>
                                    </p> -->
                                <a href="{{ route('boutique.show', ['id' => $boutique->id]) }}" class="btn btn-sm d-flex align-items-center justify-content-center" style="background-color: #f57c00; color: white; border-radius: 10px; font-size: 0.78rem; padding: 2px 8px;">
                                    <i class="fas fa-store me-1"></i> Visiter la boutique
                                </a>

                                <h4>{{ $produit->name }}</h4>
                                <div class="product-price">{{ $produit->price }} F CFA</div>
                                <button class="btn btn-success open-modal" data-id="{{ $produit->id }}" data-name="{{ $produit->name }}" data-price="{{ $produit->price }}" data-description="{{ $produit->description }}" data-image="{{ asset('storage/' . $produit->image_url) }}" data-boutique="{{ $boutique->id }}">
                                    Voir détails
                                </button>

                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn" data-id="{{ $produit->id }}">
                                        <input type="number" step="1" name="quantity" value="0" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn" data-id="{{ $produit->id }}">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Font Awesome CDN for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Toast Notification JavaScript -->
<script>
    // Fonction pour modifier les fonctions existantes du panier
    document.addEventListener("DOMContentLoaded", function() {
        // Récupérer les fonctions existantes du panier depuis le localStorage
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        // Fonction pour ajouter au panier avec notification
        function addToCartWithNotification(id, name, price, image) {
            id = id.toString();

            // Déterminer la boutique du produit (depuis le container ou le bouton)
            let boutiqueId = null;
            const openBtn = document.querySelector(`.open-modal[data-id='${id}']`);
            if (openBtn && openBtn.getAttribute('data-boutique')) {
                boutiqueId = openBtn.getAttribute('data-boutique').toString();
            } else {
                const container = document.querySelector(`.product-item-container[data-boutique]`);
                if (container) boutiqueId = container.getAttribute('data-boutique');
            }

            const existingBoutiqueId = localStorage.getItem('cart_boutique_id');
            if (!existingBoutiqueId && boutiqueId) {
                localStorage.setItem('cart_boutique_id', boutiqueId);
            } else if (existingBoutiqueId && boutiqueId && existingBoutiqueId !== boutiqueId) {
                showToast("Le panier contient déjà des produits d'une autre boutique. Videz le panier pour ajouter des produits d'ici.", 'error');
                return;
            }

            let existingProduct = cart.find(p => p.id === id);

            if (existingProduct) {
                existingProduct.quantity += 1;
                showToast(`Quantité de "${name}" augmentée dans le panier`, 'success');
            } else {
                cart.push({
                    id,
                    name,
                    price,
                    image,
                    quantity: 1
                });
                showToast(`"${name}" ajouté au panier avec succès !`, 'success');
            }

            // Mettre à jour le localStorage
            localStorage.setItem("cart", JSON.stringify(cart));

            // Mettre à jour l'interface utilisateur si la fonction existe
            if (typeof updateCartUI === 'function') {
                updateCartUI();
            }
        }

        // Fonction pour retirer du panier avec notification
        function removeFromCartWithNotification(id, name) {
            id = id.toString();
            let productIndex = cart.findIndex(p => p.id === id);

            if (productIndex !== -1) {
                if (cart[productIndex].quantity > 1) {
                    cart[productIndex].quantity -= 1;
                    showToast(`Quantité de "${name}" diminuée dans le panier`, 'warning');
                } else {
                    const removedProduct = cart[productIndex];
                    cart.splice(productIndex, 1);
                    showToast(`"${name}" retiré du panier`, 'info');
                }
            }

            // Mettre à jour le localStorage
            localStorage.setItem("cart", JSON.stringify(cart));

            // Mettre à jour l'interface utilisateur si la fonction existe
            if (typeof updateCartUI === 'function') {
                updateCartUI();
            }
        }

        // Remplacer les événements des boutons plus
        document.querySelectorAll(".plus-btn").forEach(button => {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                let productContainer = this.closest(".product-item-container");
                let productId = productContainer.querySelector(".open-modal").getAttribute("data-id");
                let productName = productContainer.querySelector(".open-modal").getAttribute("data-name");
                let productPrice = parseFloat(productContainer.querySelector(".open-modal").getAttribute("data-price"));
                let productImage = productContainer.querySelector(".product-image").src;

                addToCartWithNotification(productId, productName, productPrice, productImage);
            });
        });

        // Remplacer les événements des boutons moins
        document.querySelectorAll(".minus-btn").forEach(button => {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                let productContainer = this.closest(".product-item-container");
                let productId = productContainer.querySelector(".open-modal").getAttribute("data-id");
                let productName = productContainer.querySelector(".open-modal").getAttribute("data-name");

                removeFromCartWithNotification(productId, productName);
            });
        });

        // Ajouter des notifications pour les autres actions du panier
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('cart-close-btn') || e.target.closest('.cart-close-btn')) {
                const cartItem = e.target.closest('.cart-item');
                if (cartItem) {
                    const productName = cartItem.querySelector('h4').textContent;
                    showToast(`"${productName}" supprimé du panier`, 'info');
                }
            }
        });
    });

    // Fonction pour vider le panier avec notification
    function clearCartWithNotification() {
        showToast('Panier vidé avec succès', 'success');
        if (typeof window.clearCart === 'function') {
            window.clearCart();
        }
    }
</script>

@endsection