@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    Modifier le Produit : {{ $product->name }}
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.boutiques.products.update', [$boutique->id, $product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nom -->
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                        </div>

                        <!-- Catégorie -->
                        <div class="form-group">
                            <label>Catégorie</label>
                            <select name="category" class="form-control" required>
                                <option value="Cosmétique" {{ $product->category == 'Cosmétique' ? 'selected' : '' }}>Cosmétique</option>
                                <option value="Alimentation" {{ $product->category == 'Alimentation' ? 'selected' : '' }}>Alimentation</option>
                                <option value="Pharmacopée" {{ $product->category == 'Pharmacopée' ? 'selected' : '' }}>Pharmacopée</option>
                            </select>
                        </div>

                        <!-- Image -->
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" id="imageInput" name="image" class="form-control-file">
                            @if ($product->image_url)
                                <img src="{{ asset('storage/' . $product->image_url) }}" alt="Image actuelle" class="img-fluid mt-2" style="max-width: 200px;">
                            @endif
                        </div>

                        <!-- Prix -->
                        <div class="form-group">
                            <label>Prix</label>
                            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                        </div>

                        <!-- Certificat -->
                        <div class="form-group">
                            <label>Certificat</label>
                            <input type="text" name="certificate" class="form-control" value="{{ $product->certificate }}">
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                        </div>

                        <!-- Champ caché pour l'image recadrée -->
                        <input type="hidden" name="cropped_image" id="croppedImageInput">

                        <button type="submit" class="btn btn-success">Mettre à jour</button>
                    </form>

                    <!-- Bouton pour recadrer -->
                    {{-- <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#cropperModal">
                        Recadrer l'image
                    </button> --}}

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
                                    <img id="preview" src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('images/default.png') }}" class="img-fluid" style="max-width: 100%; display: block;">
                                </div>
                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button> --}}
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

            $('#cropperModal').modal('hide');
        }
    });
</script>
@endsection