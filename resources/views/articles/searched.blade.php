<x-layouts.layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col d-flex jusify-content-center">
                <h1 class="display-2">Risultati della ricerca "<span class="fst-italic">{{ $query }}</span>"</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>Nessun articolo corrisponde alla tua ricerca</h3>
                </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>


</x-layouts.layout>