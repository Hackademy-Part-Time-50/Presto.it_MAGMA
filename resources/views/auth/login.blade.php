<x-layouts.layout>
    @section('body-class', 'pt-custom, bg-custom')

    <x-slot:head>@vite('resources/css/auth.css')</x-slot:head>

    <div class="container-auth @if ($errors->any()) active @endif">
        <!-- Form di Login (Non visibile se siamo nella vista di registrazione) -->
        <div class="auth-form-box auth-login">
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                <h1 id="login-h1">Login</h1>

                <div class="auth-input-box">
                    <input type="email" placeholder="Email" value="{{ old('email') }}" id="loginEmail" name="email"
                        class="@error('email') error @enderror">
                    <i class='bx bxs-envelope'></i>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="auth-input-box">
                    <input type="password" placeholder="Password" id="password" name="password"
                        class="@error('password') error @enderror">
                    <i class='bx bxs-lock-alt'></i>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="auth-forgot-link">
                    <a href="{{ route('password.request') }}">Recupera Password?</a>
                </div>
                <button type="submit" class="auth-btn">Accedi</button>
                <p class="pt-2">Oppure Accedi con:</p>
                <div class="auth-social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </form>
        </div>

        <!-- Form di Registrazione -->
        <div class="auth-form-box auth-register">
            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf
                <h1>Registration</h1>

                <!-- Nome -->
                <div class="auth-input-box">
                    <input type="text" placeholder="Nome" value="{{ old('name') }}" required id="name" name="name"
                        class="@error('name') error @enderror">
                    <i class='bx bxs-user'></i>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="auth-input-box">
                    <input type="email" placeholder="Email" value="{{ old('email') }}" required id="registerEmail"
                        name="email" class="@error('email') error @enderror">
                    <i class='bx bxs-envelope'></i>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="auth-input-box">
                    <input type="password" placeholder="Password" value="{{ old('password') }}" required id="password"
                        name="password" class="@error('password') error @enderror">
                    <i class='bx bxs-lock-alt'></i>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password di conferma -->
                <div class="auth-input-box">
                    <input type="password" placeholder="Password Confirm" value="{{ old('password_confirmation') }}"
                        required id="password_confirmation" name="password_confirmation">
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <!-- Pulsante Registrazione -->
                <button type="submit" class="auth-btn" id="registerSubmitBtn">Registrati</button>
                <p class="pt-2">Oppure registrati con:</p>
                <div class="auth-social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </form>
        </div>

        <!-- Sezione di cambio vista -->
        <div class="auth-toggle-box">
            <div class="auth-toggle-panel auth-toggle-left">
                <h1>Ciao!</h1>
                <p class="pt-2">Non sei ancora registrato?</p>
                <button class="auth-btn auth-register-btn">Registrati</button>
            </div>
            <div class="auth-toggle-panel auth-toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="auth-btn auth-login-btn">Login</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const container = document.querySelector('.container-auth');
            const registerBtn = document.querySelector('.auth-register-btn');
            const loginBtn = document.querySelector('.auth-login-btn');
            const errorMessages = document.querySelectorAll('.error-message');
            const errorInputs = document.querySelectorAll('.auth-input-box input.error'); // Seleziona input con errori

            // Se Laravel ha errori, mantieni la vista registrazione attiva
            if ("{{ $errors->any() }}" == "1") {
                container.classList.add('active');
            }

            // Bottone per mostrare il form di registrazione
            registerBtn.addEventListener('click', () => {
                container.classList.add('active');
            });

            // Bottone per mostrare il form di login e nascondere gli errori
            loginBtn.addEventListener('click', () => {
                container.classList.remove('active');

                // Rimuove i messaggi di errore
                errorMessages.forEach(error => error.remove());

                // Rimuove il bordo rosso dagli input
                errorInputs.forEach(input => input.classList.remove('error'));
            });
        });

    </script>
</x-layouts.layout>