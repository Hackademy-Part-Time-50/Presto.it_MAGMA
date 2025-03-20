<x-layouts.layout>
    <div class="container-fluid text-center bg-body-tertiary">
        <div class="row justify-content-center my-5">
            <div class="col-12 d-flex flex-column align-items-center">
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
        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-sm-2 col-md-2">
                    <x-card_home_announces :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3>Non sono ancora stati creati annunci</h3>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.layout>

