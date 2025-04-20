@extends('auth.layout')
@section('content')
    
<form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">
    @csrf


    <div class="input-group mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email"
            value="{{ old('email') }}">

        @error('email')
            {{ $message }}
        @enderror

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <label for="password"> Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
        @error('password')
            {{ $message }}
        @enderror
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                    Se souvenir de moi
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-flex">connexion</button>
        </div>
        <!-- /.col -->
    </div>
</form>
@endsection
<h1>se connecter</h1>
