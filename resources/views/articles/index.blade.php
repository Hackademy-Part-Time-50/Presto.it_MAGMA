<x-layouts.layout>
    <div class="container-fluid">
        <div class="row jusify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">Tutti gli Articoli</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            @forelse($articles as $article)
                <div class="col-12 col-lg-4 col-md-6 g-4">
                    <x-card :article="$article"/>
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">
                        Non ci sono articoli da mostrare
                    </h3>
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