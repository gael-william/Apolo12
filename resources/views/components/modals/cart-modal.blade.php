@props([
    'id' => 'cartSummaryModal',
    'title' => 'Resume du panier',
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="cart-modal-items small text-muted" data-cart-modal-items>
                    Les articles du panier s'afficheront ici.
                </div>
                <div class="mt-3 p-3 rounded-3 bg-light d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Total</span>
                    <span class="fw-bold text-success" data-cart-modal-total>0 FCFA</span>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-success rounded-pill px-4">Valider</button>
            </div>
        </div>
    </div>
</div>
