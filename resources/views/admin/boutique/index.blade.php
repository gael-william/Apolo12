@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Boutiques</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active">Boutiques</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        @if (session('success'))
                            <div class="alert alert-success fw-bold text-center" id="success-message">
                                <h4>{{ session('success') }}</h4>
                            </div>
                            <script>
                                setTimeout(function() {
                                    var successMessage = document.getElementById('success-message');
                                    if (successMessage) {
                                        successMessage.style.display = 'none';
                                    }
                                }, 5000);
                            </script>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title col-md-6 col-12">Liste des boutiques</h3>
                                <div class="col-md-6 col-12 text-right">

                                    <a type="button" href="{{ route('admin.boutiques.create') }}"
                                        class="btn btn-primary btn-sm">Ajouter <i class="fa fa-plus"> </i></a>

                                    {{-- <a type="button" href="{{ route('admin') }}" class="btn btn-danger btn-sm">Fermer <i
                                            class="fa fa-arrow-left"></i></a> --}}
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Nom</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (isset($boutiques) && $boutiques->count() > 0)
                                            @foreach ($boutiques as $boutique)
                                                <tr>
                                                    <td>{{ $boutique->id }}</td>
                                                    <td>
                                                        @if ($boutique->image)
                                                            <img src="{{ asset('storage/' . $boutique->image) }}"
                                                                alt="{{ $boutique->name }}" width="50px">
                                                        @else
                                                            <span>Aucune image</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $boutique->name }}</td>
                                                    <td>{{ $boutique->description }}</td>
                                                    <td>{{ ucfirst($boutique->business_type) }}</td>
                                                    <td>

                                                        <a href="{{ route('admin.boutiques.edit', $boutique->id) }}"
                                                            class="btn btn-warning btn-sm" title="Modifier">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('admin.boutiques.show', $boutique->id) }}"
                                                            class="btn btn-primary btn-sm" title="Voir les détails">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <form method="POST" style="display:inline"
                                                            action="{{ route('admin.boutiques.destroy', $boutique->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                title="Supprimer">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                      
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6">
                                                    <span class="alert alert-danger">Aucune boutique disponible</span>
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
