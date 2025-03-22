<x-layouts.layout>
@section('body-class', 'pt-custom, bg-custom')
    <div class="container-fluid text-center">
        <div class="row justify-content-center .pt-custom">
            <div class="col-12 d-flex flex-column align-items-center position-relative overflow-hidden bg-image ripple w-100 mb-4 p-0 shadow_custom_home"
                data-mdb-ripple-color="light" style="max-height: 400px;">

                <!-- Immagine di sfondo -->  
                <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/053.webp"
                class="w-100 h-100 object-fit-cover" />
      

                <!-- Maschera per migliorare leggibilità -->
                <div class="mask position-absolute top-0 start-0 w-100 h-100"></div>

                <!-- Contenuto sopra l'immagine -->
                <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                    <h1 class="display-4 fw-bold">{{ config('app.name') }}</h1>
                    <div class="my-3">
                        @auth
                            <a href="{{ route('create.article') }}"
                                class="btn btn-light px-4 py-2 fw-bold rounded-3 shadow-sm">
                                <i class="bi bi-plus"></i> Crea Annuncio
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light px-4 py-2 fw-bold rounded-3 shadow-sm">
                                <i class="bi bi-box-arrow-in-right"></i> Accedi
                            </a>
                            <a href="{{ route('register') }}"
                                class="btn btn-outline-light px-4 py-2 fw-bold rounded-3 shadow-sm">
                                <i class="bi bi-person-plus"></i> Registrati
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                @forelse ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-4">
                        <x-card_home_announces :article="$article" />
                    </div>
                @empty
                    <div class="col-12">
                        <h3>Non sono ancora stati creati annunci</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.layout>