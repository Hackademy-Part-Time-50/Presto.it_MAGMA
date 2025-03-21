<div>
    <div class="card mx-auto my-2 height-custom-home" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title mb-5">{{ $article->title }}</h5>
            <h6 class="subtitle text-body-secondary mb-auto">{{ $article->price }} €</h6>
            <div class="d-flex justify-content-center align-items-end">
                <a href="{{ route('articles.show', [$article->id]) }}" class="btn my_btn me-2 mt-5">Dettagli</a>
                <a href="{{ route('byCategory', [$article->category->id]) }}" class="btn my_btn_secondary">{{ $article->category->name }}</a>
            </div>
        </div>
    </div>
</div>