<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="productModalLabel">Details du produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-2">
                <div class="row g-4 align-items-center">
                    <div class="col-md-5">
                        <img id="modalProductImage" src="" class="img-fluid rounded-3 shadow-sm w-100" alt="Produit">
                    </div>
                    <div class="col-md-7">
                        <h3 id="modalProductName" class="h4 fw-bold mb-3"></h3>
                        <p id="modalProductDescription" class="text-muted mb-3" style="max-height: 240px; overflow-y: auto;"></p>
                        <p class="mb-0 fs-5 fw-semibold text-success">
                            Prix: <span id="modalProductPrice"></span> FCFA
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
