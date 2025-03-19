<x-layouts.layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">    
                <h1 class="display-4 pt-5">Accedi</h1>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{ route('login') }}" class="bg-secodary-subtle shadow rounded p-5">
                    @csrf
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Indirizzo Email</label>
                        <input type="email" class="form-control" id="loginEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark">Accedi</button>
                    </div>
                </form>
            </div>
            <div class="d-flex flex-column align-items-center mt-4">
                <h6>Oppure</h6>
                <p class="mt-2"><strong>Se non possiedi ancora un account</strong><a class="ms-2" href="{{ route('register') }}">Registrati qui</a></p>
            </div>
        </div>
    </div>
</x-layouts.layout>