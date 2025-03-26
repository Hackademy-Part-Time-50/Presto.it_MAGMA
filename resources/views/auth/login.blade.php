<x-layouts.layout>
    <DIV>
        <x-success />
    </DIV>
    <!-- @section('body-class', 'pt-custom, bg-custom') -->

    <head>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <div class="container-auth">
        <div class="auth-form-box auth-login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Login</h1>
                <div class="auth-input-box">
                    <input type="email" placeholder="@error('email') {{ $message }} @else Email @enderror" value="@error('email') {{ $message }} @else {{ old('email') }} @enderror" id="loginEmail"
                        name="email" style="@error('email') border: 2px solid red; color: red; @enderror">
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="auth-input-box">
                    <input type="password" placeholder="Password" value="{{ old('password') }}" id="password"
                        name="password">
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="auth-forgot-link">
                    <a href="#">Recupera Password</a>
                </div>
                <button type="submit" class="auth-btn">Accedi</button>
                <p>Oppure Accedi con:</p>
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
                <p>Oppure registrati con:</p>
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
                <h1>Hello, Welcome!</h1>
                <p>Don't have an account?</p>
                <button class="auth-btn auth-register-btn">Registrati</button>
            </div>
            <div class="auth-toggle-panel auth-toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="auth-btn auth-login-btn">Login</button>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppis', sans-serif;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }





        .container-auth {
            position: relative;
            width: auto;
            height: 550px;
            background: #fff;
            border-radius: 30px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            overflow: hidden;
            max-width: 70%;
            display: flex;
            transition: 1.8s ease-in-out;
            place-items: center;
            margin-top: 70px;
            margin-left: auto;
            margin-right: auto;
        }

        .auth-form-box {
            position: absolute;
            right: 0;
            width: 50%;
            height: 100%;
            background: #fff;
            display: flex;
            align-items: center;
            color: #333;
            text-align: center;
            padding: 40px;
            z-index: 1;
            transition: .6s ease-in-out 1.2s, visibility 0s 1s;
        }

        .container-auth.active .auth-form-box {
            right: 50%;
        }

        .auth-form-box.auth-register {
            visibility: hidden;
        }

        .container-auth.active .auth-form-box.auth-register {
            visibility: visible;
        }

        form {
            width: 100%;
        }

        .container-auth h1 {
            font-size: 36px;
            margin: -10px 0;
        }

        .auth-input-box {
            position: relative;
            margin: 30px 0;
        }

        .auth-input-box input {
            width: 100%;
            padding: 13px 50px 13px 20px;
            background: #eee;
            border-radius: 8px;
            border: none;
            outline: none;
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }

        .auth-input-box input::placeholder {
            color: #888;
            font-weight: 400;
        }

        .auth-input-box i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #888;
        }

        .auth-forgot-link {
            margin: -15px 0 15px;
        }

        .auth-forgot-link a {
            font-size: 14.5px;
            color: #333;
            text-decoration: none;
        }

        .auth-btn {
            width: 100%;
            height: 48px;
            background: #7494ec;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
        }

        .container-auth p {
            font-size: 14.5px;
            margin-top: 15px 0;
        }

        .auth-social-icons {
            display: flex;
            justify-content: center;
        }

        .auth-social-icons a {
            display: inline-flex;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 24px;
            color: #333;
            text-decoration: none;
            margin: 0 8px;
        }

        .auth-toggle-box {
            position: absolute;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .auth-toggle-box::before {
            content: '';
            position: absolute;
            left: -250%;
            width: 300%;
            height: 100%;
            background: #7494ec;
            border-radius: 150px;
            z-index: 2;
            transition: 1.8s ease-in-out;
        }

        .container-auth.active .auth-toggle-box::before {
            left: 50%;
        }

        .auth-toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 2;
            transition: .6s ease-in-out;
        }

        .auth-toggle-panel.auth-toggle-left {
            left: 0;
            transition-delay: 1.2s;
        }

        .container-auth.active .auth-toggle-panel.auth-toggle-left {
            left: -50%;
        }

        .auth-toggle-panel.auth-toggle-right {
            right: -50%;
            transition-delay: .6s;
        }

        .container-auth.active .auth-toggle-panel.auth-toggle-right {
            right: 0;
            transition-delay: 1.2s;
        }

        .auth-toggle-panel p {
            margin-bottom: 20px;
        }

        .auth-toggle-panel .auth-btn {
            width: 160px;
            height: 46px;
            background: transparent;
            border: 2px solid #fff;
            box-shadow: none;
        }

        @media screen and (max-width: 650px) {
            .container-auth {
                height: calc(100vh - 40px);
            }

            .auth-form-box {
                bottom: 0;
                width: 100%;
                height: 70%;
            }

            .container-auth.active .auth-form-box {
                right: 0;
                bottom: 30%;
            }

            .auth-toggle-box::before {
                left: 0;
                top: -270%;
                width: 100%;
                height: 300%;
                border-radius: 20vw;
            }

            .container-auth.active .auth-toggle-box::before {
                left: 0;
                top: 70%;
            }

            .auth-toggle-panel {
                width: 100%;
                height: 30%;
            }

            .auth-toggle-panel.auth-toggle-left {
                top: 0;
            }

            .container-auth.active .auth-toggle-panel.auth-toggle-left {
                left: 0;
                top: -30%;
            }

            .auth-toggle-panel.auth-toggle-right {
                right: 0;
                bottom: -30%;
            }

            .container-auth.active .auth-toggle-panel.auth-toggle-right {
                bottom: 0;
            }
        }

        @media screen and (max-width: 400px) {
            .auth-form-box {
                padding: 20px;
            }

            .auth-toggle-panel h1 {
                font-size: 30px;
            }
        }
    </style>

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