<!DOCTYPE html>
<html lang="fr">



<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <title>PFNL.com</title>

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="images/logo2.png">

    <!-- Stylesheets -->

    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/night-mode.css') }}" rel="stylesheet">

    <!-- Vendor Stylesheets -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link href="{{ asset('vendor/unicons-2.0.1/css/unicons.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">

    <style>
        .cart-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .cart-product-img img {

            border-radius: 5px;
            margin-right: 10px;
        }

        .cart-text {
            flex-grow: 1;
        }

        .cart-item-price {
            font-weight: bold;
            color: #ff6600;
        }

        .cart-close-btn {
            background: none;
            border: none;
            color: red;
            font-size: 18px;
            cursor: pointer;
        }
    </style>

</head>

<body>

    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- Toast Notification Styles -->
    <style>
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            pointer-events: none;
        }

        .toast {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 16px 20px;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            margin-bottom: 10px;
            min-width: 300px;
            max-width: 400px;
            transform: translateX(100%);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            pointer-events: auto;
            position: relative;
            overflow: hidden;
        }

        .toast.show {
            transform: translateX(0);
            opacity: 1;
        }

        .toast.success {
            background: linear-gradient(135deg,rgb(19, 108, 4) 0%,rgb(19, 108, 4) 100%);
        }

        .toast.error {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }

        .toast.warning {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            color: #333;
        }

        .toast::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: rgba(255, 255, 255, 0.3);
        }

        .toast-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .toast-title {
            font-weight: 600;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .toast-close {
            background: none;
            border: none;
            color: inherit;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.2s;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toast-close:hover {
            opacity: 1;
        }

        .toast-message {
            font-size: 0.95rem;
            line-height: 1.4;
            opacity: 0.95;
        }

        .toast-icon {
            font-size: 1.3rem;
        }

        .toast-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background: rgba(255, 255, 255, 0.5);
            width: 100%;
            transform-origin: left;
            animation: toast-progress 3s linear forwards;
        }

        @keyframes toast-progress {
            from {
                transform: scaleX(1);
            }
            to {
                transform: scaleX(0);
            }
        }

        @media (max-width: 768px) {
            .toast-container {
                top: 10px;
                right: 10px;
                left: 10px;
            }

            .toast {
                min-width: auto;
                max-width: none;
            }
        }
    </style>

    <!-- Javascripts -->
    <!-- mes modifications  -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendor/OwlCarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/offset_overlay.js') }}"></script>
    <script src="{{ asset('js/night-mode.js') }}"></script>

    <script>
        let cart = JSON.parse(localStorage.getItem("cart")) || [];



        document.addEventListener("DOMContentLoaded", function() {
            let cartContainer = document.querySelector(".side-cart-items");
            let totalElement = document.querySelector(".main-total-cart span");
            let checkoutButton = document.querySelector(".checkout-cart");
            let emptyCartMessage = document.querySelector("#empty-cart-message");

            function updateCartCount() {
                let cartCount = cart.reduce((sum, product) => sum + product.quantity, 0);
                document.getElementById("cart-count-btn").textContent = cartCount;
                document.getElementById("cart-count").textContent = `(${cartCount} Items)`;
            }

            function updateCartUI() {
                cartContainer.innerHTML = "";
                let total = 0;

                if (cart.length === 0) {
                    emptyCartMessage.style.display = "block";
                    totalElement.textContent = "0 FCFA";
                    checkoutButton.style.display = "none";
                    // Si le panier est vide, supprimer l'association boutique
                    localStorage.removeItem('cart_boutique_id');
                } else {
                    emptyCartMessage.style.display = "none";
                    checkoutButton.style.display = "block";
                }

                cart.forEach(product => {
                    total += product.price * product.quantity;
                    cartContainer.innerHTML += `
                        <div class="cart-item" data-id="${product.id}">
                            <div class="cart-product-img">
                                <img src="${product.image}" alt="${product.name}">
                            </div>
                            <div class="cart-text">
                                <h4>${product.name}</h4>
                                <div class="qty-group">
                                    <div class="qty-cart">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn" data-id="${product.id}">
                                            <input type="number" step="1" name="quantity" value="${product.quantity}" class="input-text qty text" readonly>
                                            <input type="button" value="+" class="plus plus-btn" data-id="${product.id}">
                                        </div>
                                    </div>
                                    <div class="cart-item-price">${product.price * product.quantity} FCFA</div>
                                </div>
                                <button type="button" class="cart-close-btn" data-id="${product.id}">
                                    <i class="uil uil-multiply"></i>
                                </button>
                            </div>
                        </div>`;
                });

                totalElement.textContent = total + " FCFA";
                localStorage.setItem("cart", JSON.stringify(cart));
                bindCartEvents();
                updateCartCount();
            }

            window.clearCart = function() {
                cart = [];
                localStorage.removeItem("cart");
                localStorage.removeItem('cart_boutique_id');
                updateCartUI();
            }

            function bindCartEvents() {
                document.querySelectorAll(".plus-btn").forEach(btn => {
                    btn.addEventListener("click", function() {
                        let productId = this.getAttribute("data-id");
                        let product = cart.find(p => p.id === productId);
                        if (product) {
                            product.quantity += 1;
                            updateCartUI();
                        }
                    });
                });

                document.querySelectorAll(".minus-btn").forEach(btn => {
                    btn.addEventListener("click", function() {
                        let productId = this.getAttribute("data-id");
                        removeFromCart(productId);
                    });
                });

                document.querySelectorAll(".cart-close-btn").forEach(btn => {
                    btn.addEventListener("click", function() {
                        let productId = this.getAttribute("data-id");
                        cart = cart.filter(p => p.id !== productId);
                        updateCartUI();
                    });
                });
            }

            function addToCart(id, name, price, image) {
                id = id.toString();
                // Récupérer la boutique du produit (si présente)
                let productElem = document.querySelector(`.product-item-container[data-name][data-category] [data-id='${id}']`) || null;
                let boutiqueId = null;
                // essayer à partir du bouton open-modal
                const openBtn = document.querySelector(`.open-modal[data-id='${id}']`);
                if (openBtn && openBtn.getAttribute('data-boutique')) {
                    boutiqueId = openBtn.getAttribute('data-boutique').toString();
                } else if (productElem && productElem.closest('[data-boutique]')) {
                    boutiqueId = productElem.closest('[data-boutique]').getAttribute('data-boutique');
                }

                // Vérifier la contrainte boutique unique pour le panier
                const existingBoutiqueId = localStorage.getItem('cart_boutique_id');
                if (!existingBoutiqueId && boutiqueId) {
                    localStorage.setItem('cart_boutique_id', boutiqueId);
                } else if (existingBoutiqueId && boutiqueId && existingBoutiqueId !== boutiqueId) {
                    // Empêcher l'ajout et informer l'utilisateur
                    showToast("Le panier contient déjà des produits d'une autre boutique. Videz le panier pour ajouter des produits d'ici.", 'error');
                    return;
                }

                let existingProduct = cart.find(p => p.id === id);
                if (existingProduct) {
                    existingProduct.quantity += 1;
                } else {
                    cart.push({
                        id,
                        name,
                        price,
                        image,
                        quantity: 1
                    });
                }
                updateCartUI();
            }

            function removeFromCart(id) {
                id = id.toString();
                let productIndex = cart.findIndex(p => p.id === id);
                if (productIndex !== -1) {
                    if (cart[productIndex].quantity > 1) {
                        cart[productIndex].quantity -= 1;
                    } else {
                        cart.splice(productIndex, 1);
                    }
                }
                updateCartUI();
            }

            document.querySelectorAll(".plus-btn").forEach(button => {
                button.addEventListener("click", function() {
                    let productContainer = this.closest(".product-item-container");
                    let productId = productContainer.querySelector(".open-modal").getAttribute(
                        "data-id");
                    let productName = productContainer.querySelector(".open-modal").getAttribute(
                        "data-name");
                    let productPrice = parseFloat(productContainer.querySelector(".open-modal")
                        .getAttribute("data-price"));
                    let productImage = productContainer.querySelector(".product-image").src;

                    addToCart(productId, productName, productPrice, productImage);
                });
            });

            document.querySelectorAll(".minus-btn").forEach(button => {
                button.addEventListener("click", function() {
                    let productContainer = this.closest(".product-item-container");
                    let productId = productContainer.querySelector(".open-modal").getAttribute(
                        "data-id");
                    removeFromCart(productId);
                });
            });

            updateCartUI();
        });

        async function handleCheckout() {
            const userPhone = document.getElementById("userPhone")?.value;
            // Priorité: boutique_id présent dans la page sinon fallback sur localStorage
            let boutiqueId = document.getElementById("boutique_id")?.value;
            if (!boutiqueId) {
                boutiqueId = localStorage.getItem('cart_boutique_id');
            }

            if (!userPhone || !boutiqueId) {
                alert("Numéro ou boutique manquant.");
                return;
            }

            const orderData = {
                numero_telephone: userPhone,
                panier: cart,
                total: cart.reduce((sum, item) => sum + item.price * item.quantity, 0),
                boutique_id: boutiqueId,
            };

            try {
                const response = await fetch('/commandes', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                    },
                    body: JSON.stringify(orderData),
                });

                const result = await response.json();

                if (result.success) {
                    clearCart();
                    window.location.href = result.redirect_url; // ✅ vers show_commandes
                } else {
                    alert("Erreur de commande: " + result.message);
                }
            } catch (error) {
                console.error("Erreur :", error);
                alert("Erreur lors du traitement de la commande.");
            }
        }

        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById("checkout-btn")?.addEventListener("click", handleCheckout);
        });
    </script>







    {{-- script pour le modal --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".open-modal").forEach(button => {
                button.addEventListener("click", function() {
                    let name = this.getAttribute("data-name");
                    let price = this.getAttribute("data-price");
                    let description = this.getAttribute("data-description");
                    let image = this.getAttribute("data-image");

                    document.getElementById("modalProductName").textContent = name;
                    document.getElementById("modalProductPrice").textContent = price;
                    document.getElementById("modalProductDescription").textContent = description;
                    document.getElementById("modalProductImage").src = image;

                    let productModal = new bootstrap.Modal(document.getElementById("productModal"));
                    productModal.show();
                });
            });
        });
    </script>


    {{-- script pour les categrories --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const categoryFilters = document.querySelectorAll(".category-filter");
            const products = document.querySelectorAll(".product-item-container");

            categoryFilters.forEach(filter => {
                filter.addEventListener("click", function(event) {
                    event.preventDefault();
                    const selectedCategory = this.getAttribute("data-category");

                    products.forEach(product => {
                        if (product.getAttribute("data-category") === selectedCategory ||
                            selectedCategory === "all") {
                            product.style.display =
                                "block"; // Afficher le produit correspondant
                        } else {
                            product.style.display = "none"; // Masquer les autres
                        }
                    });

                    // Fermer le modal après sélection
                    let categoryModal = bootstrap.Modal.getInstance(document.getElementById(
                        'category_model'));
                    categoryModal.hide();
                });
            });
        });
    </script>


    {{-- Barre de recherche --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const productCards = document.querySelectorAll(".product-card");

            searchInput.addEventListener("input", function() {
                const query = this.value.toLowerCase();

                productCards.forEach(card => {
                    const productName = card.getAttribute("data-name");
                    if (productName.includes(query)) {
                        card.style.display = "block";
                    } else {
                        card.style.display = "none";
                    }
                });
            });
        });
    </script>
</body>

<!-- Mirrored from gambolthemes.net/html-items/gambo_supermarket_demo_new/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2024 12:35:36 GMT -->

</html>
