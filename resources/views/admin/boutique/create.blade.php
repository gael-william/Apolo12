@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center"> <!-- Centrer le formulaire -->
        <!-- Formulaire -->
        <div class="col-md-8">
            <div class="card mt-4"> <!-- Ajouter une marge en haut -->
                <div class="card-header bg-primary text-white">
                    Ajouter une Boutique
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.boutiques.store') }}" method="POST" enctype="multipart/form-data" onsubmit="prepareImage()">
                        @csrf

                        <!-- Nom -->
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <!-- Image -->
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" id="imageInput" name="image" class="form-control-file" required>
                        </div>

                        <!-- Localisation -->
                        <div class="form-group">
                            <label>Localisation</label>
                            <input type="text" name="location" class="form-control" required>
                        </div>

                        <!-- Ville -->
                        <div class="form-group">
                            <label>Ville</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <!-- Nom/Prenom Responsable -->
                        <div class="form-group">
                            <label>Nom / Prénom du Responsable</label>
                            <input type="text" name="owner_name" class="form-control" required>
                        </div>

                        <!-- Numéro -->
                        <div class="form-group">
                            <label>Numéro</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <!-- Type de l'entreprise -->
                        <div class="form-group">
                            <label>Type de l'Entreprise</label>
                            <select name="business_type" class="form-control" required>
                                <option value="privé">Privé</option>
                                <option value="publique">Publique</option>
                            </select>
                        </div>

                        <!-- Canvas caché pour l'image recadrée -->
                        <input type="hidden" name="cropped_image" id="croppedImageInput">

                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </form>

                    <!-- Bouton pour ouvrir la modale de recadrage -->
                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#cropperModal">
                        Recadrer l'image
                    </button>

                    <!-- Modale de recadrage -->
                    <div class="modal fade" id="cropperModal" tabindex="-1" role="dialog" aria-labelledby="cropperModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cropperModalLabel">Recadrer l'image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <img id="preview" src="{{ asset('images/default.png') }}" class="img-fluid" style="max-width: 100%; display: block;">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="button" class="btn btn-success" id="cropImageBtn">Valider</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Script Cropper.js -->
    <script>
        let cropper;
        const imageInput = document.getElementById('imageInput');
        const preview = document.getElementById('preview');
        const croppedImageInput = document.getElementById('croppedImageInput');
        const cropImageBtn = document.getElementById('cropImageBtn');

        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(preview, {
                        aspectRatio: 1,
                        viewMode: 1,
                    });

                    // Ouvrir la modale après chargement de l'image
                    $('#cropperModal').modal('show');
                };
                reader.readAsDataURL(file);
            }
        });

        cropImageBtn.addEventListener('click', function() {
            if (cropper) {
                const canvas = cropper.getCroppedCanvas({
                    width: 300,
                    height: 300
                });

                croppedImageInput.value = canvas.toDataURL('image/png');

                // Fermer la modale après validation
                $('#cropperModal').modal('hide');
            }
        });
    </script>
@endsection
