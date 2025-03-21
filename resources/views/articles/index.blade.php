<x-layouts.layout>
    <div class="container">
        <div class="row jusify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1 pt-custom">Tutti gli Articoli</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            @forelse($articles as $article)
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
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