<x-layouts.layout>
    <div class="container mt-5">
        <h2 class="text-center">Perché diventare un revisore?</h2>
        <p class="text-muted text-center">I revisori aiutano a mantenere alta la qualità degli annunci su Presto.it.</p>

        <div class="d-flex justify-content-center mt-4">
            @auth
                <form action="{{ route('revisore.richiesta') }}" method="POST" class="w-50">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100">Diventa un revisore</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-warning w-50 text-center">Accedi per fare richiesta</a>
            @endauth
        </div>

        @if(session('message'))
            <div class="alert alert-success mt-3 text-center">{{ session('message') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger mt-3 text-center">{{ session('error') }}</div>
        @endif
    </div>
</x-layouts.layout>
