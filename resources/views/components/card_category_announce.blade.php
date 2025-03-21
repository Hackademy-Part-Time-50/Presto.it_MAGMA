<div class="card card-w mx-auto height-custom shadow text-center mb-3">
    <img src="http://picsum.photos/200" class="card-img-top" alt="Immagine dell'articolo {{$article->title}}">
    <div class="card-body d-flex flex-column">
        <h4 class="card-title">{{ $article->title}}</h4>
        <h5 class="card-subtitle mb-auto">{{ $article->category->name }}</h5>
        <h6 class="card-subttitle text-body-secondary mb-3">{{ $article->price}} €</h6>
        <div class="d-flex justify-content-around mt-auto ">
            <a href="{{ route('articles.show', [$article->id]) }}" class="btn my_btn btn-sm w-45 px-4">Dettaglio</a>
        </div>
    </div>
</div>
