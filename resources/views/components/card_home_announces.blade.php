<div class="card mx-auto my-3 card-w">
    <img src="http://picsum.photos/200" class="card-img-top" alt="{{ $article->title }}">
    <div class="card-body text-center">
        <h5 class="card-title">{{ $article->title }}</h5>
        <h6 class="card-subtitle text-muted mb-3">{{ $article->price }}</h6>
        <div class="d-flex justify-content-center gap-2">
            <a href="{{ route('articles.show', [$article->id]) }}" class="btn btn-primary">Dettagli</a>
            <a href="{{ route('byCategory', [$article->category->id]) }}" class="btn btn-outline-info">{{ $article->category->name }}</a>
        </div>
    </div>
</div>