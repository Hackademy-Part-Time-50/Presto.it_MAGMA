<x-layouts.layout>
    @section('body-class', 'pt-custom, bg-custom')

    <x-slot:head>@vite('resources/css/auth.css')</x-slot:head>

    <div class="container-auth">
        <div class="auth-form-box auth-login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 id="login-h1">Login</h1>

                <div class="auth-input-box">
                    <input type="email" placeholder="Email" value="{{ old('email') }}" id="loginEmail" name="email"
                        class="@error('email') error @enderror">
                    <i class='bx bxs-envelope'></i>
                    @error('email')
                    @enderror
                </div>

                <div class="auth-input-box">

                    <input type="password" placeholder="Password" id="password" name="password"
                        class="@error('email') error @enderror">
                    <i class='bx bxs-lock-alt'></i>
                    @error('email')
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

        <div class="auth-form-box auth-register">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Registration</h1>
                <div class="auth-input-box">
                    <input type="text" placeholder="Nome" value="{{ old('name') }}" required id="name" name="name">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="auth-input-box">
                    <input type="email" placeholder="Email" value="{{ old('email') }}" required id="registerEmail"
                        name="email">
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="auth-input-box">
                    <input type="password" placeholder="Password" value="{{ old('password') }}" required id="password"
                        name="password">
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="auth-input-box">
                    <input type="password" placeholder="Password Confirm" value="{{ old('password') }}" required
                        id="password_confirmation" name="password_confirmation">
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="auth-btn">Registrati</button>
                <p class="pt-2">Oppure registrati con:</p>
                <div class="auth-social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </form>
        </div>

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
        const container = document.querySelector('.container-auth');
        const registerBtn = document.querySelector('.auth-register-btn');
        const loginBtn = document.querySelector('.auth-login-btn');

        registerBtn.addEventListener('click', () => {
            container.classList.add('active');
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove('active');
        });
    </script>

</x-layouts.layout>