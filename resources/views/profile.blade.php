<x-layouts.layout>
    <div class="container custom-loyaut">
        <x-success />
        <div class="bg-custom-loyaut">
            <div class="container text-center text-custom d-flex flex-column align-items-center py-4">
                @if($user->profile_image)
                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Immagine Profilo"
                        class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                @endif
                <h1>Controlla qui i tuoi articoli caricati {{ $user->name }}!</h1>

                @if($user->is_revisor)
                    <span class="badge bg-success mt-2">Revisore</span>
                @else
                    <span class="badge bg-secondary mt-2">Non sei un revisore</span>
                @endif
                <div class="mt-3">
                    <a href="{{ route('homepage') }}" class="btn btn-primary">Torna alla Home</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>

        <!-- Sezione per Modifica Profilo -->
        <section class="profile-section py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Informazioni del Profilo</h2>
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                    class="form-control" readonly>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="surname">Cognome</label>
                                <input type="text" name="surname" id="surname"
                                    value="{{ old('surname', $user->surname) }}" class="form-control" readonly>
                                @error('surname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gender">Sesso</label>
                                <select name="gender" id="gender" class="form-control" disabled>
                                    <option value="" disabled selected>Seleziona il sesso</option>
                                    <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>
                                        Maschio</option>
                                    <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Femmina</option>
                                    <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>
                                        Altro</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="birth_date">Data di Nascita</label>
                                <input type="date" name="birth_date" id="birth_date"
                                    value="{{ old('birth_date', $user->birth_date) }}" class="form-control" readonly>
                                @error('birth_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                    class="form-control" readonly>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="profile_image">Immagine Profilo</label>
                                <input type="file" name="profile_image" id="profile_image" class="form-control-file" disabled>
                                @error('profile_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="button" id="editProfileButton" class="btn btn-warning mt-3 btn-block">Modifica Profilo</button>
                            <button type="submit" id="saveChangesButton" class="btn btn-success mt-3 btn-block" style="display: none;">Salva Modifiche</button>
                        </form>

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
                                <x-card :article="$article" />
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Bottone per creare nuovo articolo -->
                <div class="mt-4 text-center">
                    <a href="{{ route('create.article') }}" class="btn btn-warning btn-lg">Crea Nuovo Articolo</a>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.getElementById('editProfileButton').addEventListener('click', function() {
            // Rendi modificabili i campi
            document.getElementById('name').removeAttribute('readonly');
            document.getElementById('surname').removeAttribute('readonly');
            document.getElementById('gender').disabled = false;
            document.getElementById('birth_date').removeAttribute('readonly');
            document.getElementById('profile_image').disabled = false;

            // Mostra il bottone Salva e nascondi il bottone Modifica
            document.getElementById('saveChangesButton').style.display = 'block';
            this.style.display = 'none';
        });
    </script>
</x-layouts.layout>
