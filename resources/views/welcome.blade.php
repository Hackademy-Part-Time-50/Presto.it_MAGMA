<x-layouts.layout>
    <div class="container-fluid text center bg-body-tertiary">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-4">Presto.it</h1>
                <div class="my-3">
                    @auth
                        <a href="{{ route('create.article') }}" class="btn btn-dark px-4 py-2 fw-bold rounded-3 shadow-sm">
                            <i class="bi bi-plus"></i> Crea Annuncio
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-dark px-4 py-2 fw-bold rounded-3 shadow-sm">
                            <i class="bi bi-box-arrow-in-right"></i> Accedi
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-dark px-4 py-2 fw-bold rounded-3 shadow-sm">
                            <i class="bi bi-person-plus"></i> Registrati
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>

