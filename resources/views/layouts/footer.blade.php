<!-- Footer Start -->
<footer class="footer text-white pt-5 pb-3" style="background: linear-gradient(135deg, #23243a 0%, #2b2f4c 100%); box-shadow: 0 -4px 24px rgba(43,47,76,0.15);">
    <div class="container">
        <div class="row align-items-center gy-4">

            <!-- Social & Contact -->
            <div class="col-lg-4 order-lg-3 text-center text-lg-end">
                <h6 class="fw-bold mb-3 fs-5">Suivez-nous</h6>
                <div class="d-flex justify-content-center justify-content-lg-end gap-3 mb-3">
                    <a href="#" aria-label="Facebook" class="text-white fs-4 hover-social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter" class="text-white fs-4 hover-social"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Instagram" class="text-white fs-4 hover-social"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="LinkedIn" class="text-white fs-4 hover-social"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://wa.me/22606598919" aria-label="WhatsApp" class="text-white fs-4 hover-social"><i class="fab fa-whatsapp"></i></a>
                </div>
                <ul class="list-unstyled mb-0 text-start text-lg-end small">
                    <li><a href="tel:+22602101008" class="text-white text-decoration-none fs-6"><i class="uil uil-phone"></i> +226 02-10-10-08 / +226 51-79-99-91</a></li>
                    <li><a href="mailto:info@kitiga.com" class="text-white text-decoration-none fs-6"><i class="uil uil-envelope-alt"></i> info@kitiga.com</a></li>
                </ul>
            </div>

            <!-- Logo & Slogan -->
            <div class="col-lg-4 order-lg-1 text-center">
                <img src="{{ asset('images/logo2.png') }}" alt="Logo Kitiga" style="height: 60px; filter: drop-shadow(0 2px 8px #fff2);">
                <p class="text-white mt-3 mb-1 fs-5 fw-semibold fst-italic">
                    <i class="fas fa-star text-warning"></i>
                    Venez découvrir ce que vous n'avez jamais vu !
                    <i class="fas fa-star text-warning"></i>
                </p>
                <span class="badge rounded-pill bg-gradient px-3 py-2 mt-2" style="background: linear-gradient(90deg,#ffb347,#ffcc80); color:#23243a;">
                    <i class="fas fa-code"></i> Développé par Tindano Gaël & Majoric Guyella
                </span>
            </div>

            <!-- Partenaire -->
            <div class="col-lg-4 order-lg-2 text-center text-lg-start">
                <img src="{{ asset('images/logo3.png') }}" alt="Logo Direction Économie Verte" style="height: 70px; filter: drop-shadow(0 2px 8px #fff2);">
                <p class="text-white mt-3 mb-0 fw-semibold fst-italic fs-6">
                    <i class="fas fa-handshake text-success"></i>
                    En partenariat avec la<br>
                    Direction Générale de l'Économie Verte<br>
                    et du Changement Climatique
                </p>
            </div>
        </div>

        <hr class="my-4" style="border-top: 1.5px solid #444;">

        <div class="row align-items-center text-center text-lg-start small">
            <div class="col-lg-8 mb-2">
                <span class="me-3"><i class="fas fa-map-marker-alt text-info"></i> Burkina Faso</span>
                <span class="me-3"><i class="fas fa-clock text-warning"></i> Lun - Dim : 00h - 00h</span>
            </div>
            <div class="col-lg-4 text-lg-end">
                <p class="mb-0 fs-6 fw-semibold">
                    &copy; 2024 <strong>kitiga.com</strong> — Tous droits réservés.
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Custom CSS for hover effects -->
<style>
    .hover-social:hover {
        color: #ffb347 !important;
        transform: scale(1.15);
        transition: all 0.2s;
        text-shadow: 0 2px 8px #ffb34755;
    }
    .bg-gradient {
        background: linear-gradient(90deg,#ffb347,#ffcc80);
        color: #23243a !important;
    }
</style>
<!-- Footer End -->
