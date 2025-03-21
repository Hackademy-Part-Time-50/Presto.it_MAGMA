<div>
    <div class="card mx-auto my-2 height-custom-home" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <h6 class="subtitle text-body-secondary">{{ $article->price }}</h6>
            <div class="d-flex justify-content-center align-items-end mt-5">
                <a href="{{ route('articles.show', [$article->id]) }}" class="btn my_btn mx-2">Dettagli</a>
                <a href="{{ route('byCategory', [$article->category->id]) }}" class="btn my_btn_secondary">{{ $article->category->name }}</a>
            </div>
        </div>
    </div>
</div>