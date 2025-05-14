@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ajouter votre nouvelle catégorie</h1>
                    </div>
                </div>
            </div>
        </section>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Ajouter une catégorie</h3>
                            </div>
                            <form action="{{ route('admin.categories.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control" placeholder="Nouvelle catégorie" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-info" type="submit">Ajouter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
