<x-layouts.layout>



    <header class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 ">

                <!-- Contenuto sopra l'immagine -->
                <div class="position-absolute top-50 start-50 translate-middle text-center text-custom">
                    <h1 class="">{{ config('app.name') }}</h1>
                    
                        @auth
                            <a href="{{ route('create.article') }}"
                                class="btn btn-light px-4 py-2 fw-bold rounded-3 shadow-sm">
                                Crea Annuncio
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn my_btn px-4 py-2 fw-bold rounded-3 shadow-sm me-2">
                                Accedi
                            </a>
                            <a href="{{ route('register') }}"
                                class="btn btn-outline-light px-4 py-2 fw-bold rounded-3 shadow-sm">
                                Registrati
                            </a>
                        @endauth
                    
                </div>

            </div>
        </div>
    </header>


    <div class="container text-center">
        <div class="row">
            @forelse ($articles as $article)
                <div class="col">
                    <x-card_home_announces :article="$article" />
                </div>
            @empty
                <div class="col">
                    <h3>Non sono ancora stati creati annunci</h3>
                </div>
            @endforelse
        </div>
    </div>
  
    






</x-layouts.layout>






