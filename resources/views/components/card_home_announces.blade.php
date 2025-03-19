<div>
    <div class="card mx-auto my-2" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <h6 class="subtitle text-body-secondary">{{ $article->price }}</h6>
        <div class="d-flex justify-content-evenly align-items-center mt-3">
            <a href="#" class="btn btn-primary mx-2">Dettagli</a>
            <a href="#" class="btn btn-outline-info">{{ $article->category->name }}</a>
        </div>
    </div>
    </div>
</div>