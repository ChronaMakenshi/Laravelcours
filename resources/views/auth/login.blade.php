@extends("base")

@section("content")

    <h1 class="m-5 text-center bg-primary p-2 rounded text-white">Se connecter</h1>

    <div class="card m-5">
        <div class="card-body">
            <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">
                @csrf
                <div class="form-group m-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group m-2">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control @error("password") is-invalid @enderror" id="password" name="password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
@endsection