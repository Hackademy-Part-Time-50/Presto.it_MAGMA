<x-layouts.layout>
    @section('body-class', 'pt-custom, bg-custom')
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <div class="col-12 d-flex flex-column align-items-center position-relative overflow-hidden bg-image ripple pt-custom mb-4"
                data-mdb-ripple-color="light">

                <!-- Immagine di sfondo -->
                <div class="container-img">
                    <img src="http://picsum.photos/1000" alt="Immagine che occupa tutto lo spazio" class="img-full">
                </div>

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
                            <a href="{{ route('login') }}" class="btn my_btn px-4 py-2 fw-bold rounded-3 shadow-sm me-2">
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
            <div class="row mt-5 text-center container ">
                @forelse ($articles as $article)
                    <div class="col-12 col-md-6 col-xl-4">
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
