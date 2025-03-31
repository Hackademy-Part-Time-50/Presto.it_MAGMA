<x-layouts.layout>
    <div class="custom-loyaut pt-5">
        <div class="container">

            <h1>{{ $article->title }}</h1>
            
                <div class="container-fluid p-4 d-flex justify-content-center prodotto">
                    <div class="row justify-content-center align-items-center">

                        {{-- carosello per immagini--}}
                        <div class="col-12 col-md-6 mb-3">
                            @if ($article->images->count() > 0)
                                <div id="carouselExample" class="carousel slide">
                                    <div class="carousell-inner">
                                        @foreach ($article->images as $key=>$image)
                                            <div class="carousel-item @if ($loop->first) active @endif">
                                                <img src="{{ $image->getUrl(200, 200) }}" class="d-block w-100 rounded shadow " 
                                                    alt="Immagine {{$key + 1}} dell'articolo {{ $article->title }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    @if ($article->images->count() > 1)
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    @endif
                                </div>
                            @else
                                <img src="https://picsum.photos/300" alt="essuna foto iserita dall'utente">
                            @endif
                        </div>

                        {{-- parte descrittiva --}}
                        <div class="col-lg-6">
                            <div class="container">
                                <!-- Nome Venditore con classe personalizzata -->
                                <p class="vendor-name"><strong>Nome venditore</strong></p>
                                <!-- Descrizione con classe personalizzata -->
                                <p>{{ $article->description }}</p>
                                <!-- Prezzo con classe personalizzata -->
                                <div>
                                    <span class="price">€{{ $article->price }}</span>
                                </div>

                                <a href="{{route ('articles.index')}}" class="btn btn_custom">Indietro</a>
                            </div>
                        </div>




                    </div>
                </div>
    
    
        </div>


    </div>
    





</x-layouts.layout>



