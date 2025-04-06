<x-layouts.layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 text-center">Cambia la tua Password</h4>
                    </div>

                    <div class="card-body">
                        {{-- Successo --}}
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        {{-- Errore --}}
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form method="POST" action="{{ route('password.update-password') }}">
                            @csrf
                            @method('PUT')

                            {{-- Password attuale --}}
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Password attuale</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="form-control" required>
                                @error('current_password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nuova password --}}
                            <div class="mb-3">
                                <label for="new_password" class="form-label">Nuova Password</label>
                                <input type="password" name="new_password" id="new_password" class="form-control"
                                    required oninput="checkPasswordStrength()">
                                <div id="password-strength" class="mt-2 small fw-bold"></div>
                                @error('new_password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Conferma nuova password --}}
                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Conferma Nuova
                                    Password</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                    class="form-control" required>
                                @error('new_password_confirmation')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tentativi rimanenti --}}
                            <div class="mb-4">
                                <p class="mb-0 text-muted">
                                    Tentativi rimanenti: <strong
                                        class="text-danger">{{ session('remaining_attempts', 3) }}</strong>
                                </p>
                            </div>

                            {{-- Pulsante Submit --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="bi bi-shield-lock-fill me-1"></i> Aggiorna Password
                                </button>
                            </div>
                        </form>

                        {{-- Link per reset password --}}
                        <div class="mt-3 text-center">
                            <a href="{{ route('password.request') }}" class="btn btn-link">Hai dimenticato la tua password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Script per verifica forza password --}}
        <script>
            function checkPasswordStrength() {
                const password = document.getElementById('new_password').value;
                const strengthEl = document.getElementById('password-strength');
                let score = 0;

                if (password.length >= 8) score++;
                if (/[A-Z]/.test(password)) score++;
                if (/[a-z]/.test(password)) score++;
                if (/\d/.test(password)) score++;
                if (/[^A-Za-z0-9]/.test(password)) score++;

                const messages = [
                    { text: 'Password troppo debole', color: 'danger' },
                    { text: 'Password debole', color: 'warning' },
                    { text: 'Password media', color: 'info' },
                    { text: 'Password forte', color: 'primary' },
                    { text: 'Password molto forte', color: 'success' }
                ];

                const msg = messages[Math.min(score, messages.length - 1)];
                strengthEl.innerHTML = `<span class="badge bg-${msg.color}">${msg.text}</span>`;
            }
        </script>
    </div>
</x-layouts.layout>
