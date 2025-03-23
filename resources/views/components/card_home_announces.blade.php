<div class="card mx-auto my-3 rounded-3 card-w">
    <!-- Immagine prodotto con etichetta categoria -->
    <div class="position-relative">
        <img src="http://picsum.photos/200" class="card-img-top w-100" alt="{{ $article->title }}">

        <!-- Etichetta Categoria cliccabile in maiuscolo -->
        <a href="{{ route('byCategory', [$article->category->id]) }}" class="badge bg-info position-absolute bottom-0 start-0 m-2 text-white text-decoration-none text-uppercase">
            {{ $article->category->name }}
        </a>
    </div>

    <div class="card-body text-center">
        <!-- Titolo prodotto -->
        <h5 class="card-title">{{ $article->title }}</h5>

        <!-- Prezzo prodotto -->
        <h6 class="card-subtitle text-muted mb-3">{{ $article->price }} €</h6>

        <!-- Descrizione prodotto -->
        <p class="card-text">{{ Str::limit($article->description, 100) }}</p>

        <!-- Bottone Dettagli -->
        <a href="{{ route('articles.show', [$article->id]) }}" class="btn btn-primary">Dettagli</a>
    </div>
</div>
