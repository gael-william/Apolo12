<!DOCTYPE html>
<html lang="fr">


<!-- Mirrored from gambolthemes.net/html-items/gambo_supermarket_demo_new/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2024 12:34:38 GMT -->

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <title>K.com</title>

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
            const boutiqueId = document.getElementById("boutique_id")?.value;

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
