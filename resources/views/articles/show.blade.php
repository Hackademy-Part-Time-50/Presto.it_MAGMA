<x-layouts.layout>
    <div class="container-fluid p-4 d-flex justify-content-center prodotto">
        <div class="row w-100 justify-content-center align-items-center">
            {{-- carosello --}}
            <div id="carouselExampleIndicators" class="carousel slide col-lg-6">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/1000/600" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/1000/600" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/1000/600" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Indietro</span>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Avanti</span>
                </button>
            </div>
    
            {{-- parte descrittiva --}}
           
        <div class="col-lg-6">
            <div class="container">
                <!-- Nome Venditore con classe personalizzata -->
                <p class="vendor-name"><strong>Nome venditore</strong></p>
                <!-- Titolo con classe personalizzata -->
                <h1>{{ $article->title }}</h1>
                <!-- Descrizione con classe personalizzata -->
                <p>{{ $article->description }}</p>
                <!-- Prezzo con classe personalizzata -->
                <div>
                    <span class="price">€{{ $article->price }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
    
    








</x-layouts.layout>
