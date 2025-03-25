<x-layouts.layout>
    <div class="container custom-loyaut">
        <div class="row">
            <div class="col d-flex jusify-content-center">
                <h1 class="display-2">Articoli della categotria <span class="fst-italic fw-bold">
                    {{ $category->name }}
                </span></h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>Non sono ancora stati creati articoli per questa categoria!</h3>
                    @auth
                        <a class="btn btn-dark my-5" href="{{ route('create.article') }}">Pubblica un annuncio</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.layout>
