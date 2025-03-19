<x-layouts.layout>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">    
                <h1 class="display-4 pt-5">Registrati</h1>
            </div>
        </div>
        
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 mb-3">
                <form method="POST" action="/register" class="bg-body-tertiary shadow rounded p-5">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control form-control @error('name') is-invalid @enderror" id="name" name="name">
                        @error('name') <span class="small text-danger">{{ $message }}</span> @enderror 
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Indirizzo Email</label>
                        <input type="email" class="form-control form-control @error('email') is-invalid @enderror" id="registerEmail" name="email">
                        @error('email') <span class="small text-danger">{{ $message }}</span> @enderror 
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password') <span class="small text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password</label>
                        <input type="password" class="form-control form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark">Registrati</button>
                    </div>
                </form>
            </div>
            <div class="d-flex flex-column align-items-center mt-4">
                <h6>Oppure</h6>
                <p class="mt-2"><strong>Se possiedi già un account</strong><a class="ms-2" href="{{ route('login') }}">Accedi qui</a></p>
            </div>
        </div>
    </div>
</x-layouts.layout>