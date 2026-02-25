@props([
    'id' => 'deleteModal',
    'title' => 'Supprimer',
    'message' => 'Cette action est irreversible. Continuer ?',
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold text-danger">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-muted">{{ $message }}</div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger rounded-pill px-4" data-delete-action>Supprimer</button>
            </div>
        </div>
    </div>
</div>
