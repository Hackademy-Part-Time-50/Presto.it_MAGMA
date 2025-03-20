<div class="card card-w mx-auto height-custom shadow text-center mb-3">
    <img src="http://picsum.photos/200" class="card-img-top" alt="Immagine dell'articolo {{$article->title}}">
    <div class="card-body d-flex flex-column">
        <h4 class="card-title">{{ $article->title}}</h4>
        <h6 class="card-subttitle text-body-secondary mb-3">{{ $article->price}}</h6>
        <div class="d-flex justify-content-around mt-auto ">
            <a href="#" class="btn btn-primary d-flex justify-content-between btn-sm px-4">Dettaglio</a>
            <a href="" class="btn btn-outline-info d-flex justify-content-between btn-sm px-4">Categoria</a>
        </div>
    </div>
</div>