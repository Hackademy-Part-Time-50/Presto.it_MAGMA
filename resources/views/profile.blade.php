<x-layouts.layout>

    <div class="container custom-loyaut">

    <div class="bg-custom-loyaut">
        <div class="container text-center text-custom">
            <h1> Controlla qui i tuoi articoli caricati {{ $user->name }}!</h1>  <!-- Nome utente -->
            
        </div>
    </div>

    <section class="profile-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="img-preview" style="background-image: url('{{ asset('storage/' . $user->profile_image) }}');"></div>  <!-- Se hai un'immagine di profilo -->
                </div>
                <div class="col-md-8">
                    <h2>Informazioni del Profilo</h2>
                    <p><strong>Nome:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Ruolo:</strong> {{ $user->is_revisor ? 'Revisore' : 'Utente' }}</p>
                    <!-- Puoi aggiungere altri dettagli dell'utente qui -->
                </div>
            </div>
        </div>
    </section>


    <!-- Sezione Articoli Pubblicati -->
    <section class="articles-section py-5">
        <div class="container">
            <h2>I tuoi Articoli</h2>
            <div class="row">
                @if($articles->isEmpty())
                    <p>Non hai ancora pubblicato articoli.</p>
                @else
                    @foreach ($articles as $article)
                        <div class="col-md-4 mb-4">
                            <!-- Usando una colonna per ogni card -->
                            <x-card :article="$article" />
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>



</div>




</x-layouts.layout>