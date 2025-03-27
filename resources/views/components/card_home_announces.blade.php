<div class="container my-5">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="product-card">
                <div class="position-relative">
                    <img src="https://picsum.photos/1000/600" alt="Immagine prodotto">
                    <a href="{{ route('byCategory', [$article->category->id]) }}"
                        class="badge bg-custom position-absolute bottom-0 start-0 m-2 text-white text-decoration-none text-uppercase">
                        {{ $article->category->name }}
                    </a>
                </div>


                <div class="product-card-body ">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->price }}</p>

                    <div class="justify-content-center">

                        <a href="{{ route('articles.show', [$article->id]) }}" class="btn btn_custom">{{__('ui.details')}}</a>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

