<x-layouts.layout>


    <header class="container-fluid">
    
        <div class="row">
                <div class="col-12 col-md-6 ">
                    
                </div>


                <div class="col-12 col-md-6 align-content-center text-center custom-header ">

                    <!-- Contenuto sopra l'immagine -->
                    
                        <div class="text-custom">
                            <p class="fs-3 text">Non lo usi?</p>
                            <p class="fs-3 text">Mettilo in vendita,</p>
                            <p class="fs-1 text fw-bold">{{ config('app.name') }}!</p>
                            
                                @auth
                                    <a href="{{ route('create.article') }}" class="btn btn-custom-other">
                                        Crea Annuncio
                                    </a>
                                {{-- @else
                                    <a href="{{ route('login') }}" class="btn btn-custom-other">
                                        Accedi
                                    </a> --}}
                                @endauth
                            
                        </div>
                    

                </div>


        </div>
    </header>


    <div class="container">
        <div class="row">
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



    <div class="container align-content-center my-5">
        <div class="row">

           



            <div class="col-12 col-md-6 img-revisore">
                
                
               
              
        </div>
        
            <div class="col-12 col-md-6 mt-3 align-content-center text-center">
                
                    <h5>Vuoi diventare revisore?</h5>
                    <p>Clicca il bottone sottostante, farai richiesta al nostro admin!</p>
                    <a href="{{ route('become.revisor') }}" class="btn btn-custom-other">Diventa revisore!</a>
                  
            </div>
        </div>
    </div>

<x-success/>



</x-layouts.layout>






