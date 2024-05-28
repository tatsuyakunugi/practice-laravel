<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-item">
                <a class="link" href="/">✕</a>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="content">
            <form class="register-form" action="/register" method="post">
                @csrf
                <div class="register-form__heading">
                    <p>Registration</p>
                </div>
                <div class="register-form__group">
                    <div class="register-form__group-title">
                        <span>Username</span>
                    </div>
                    <div class="register-form__group-content">
                        <div class="input__text">
                            <input type="text" name="name">
                        </div>
                        <div class="form__error">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="register-form__group">
                    <div class="register-form__group-title">
                        <span>Email</span>
                    </div>
                    <div class="register-form__group-content">
                        <div class="input__text">
                            <input type="email" name="email">
                        </div>
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="register-form__group">
                    <div class="register-form__group-title">
                        <span>Password</span>
                    </div>
                    <div class="register-form__group-content">
                        <div class="input__text">
                            <input type="password" name="password">
                        </div>
                        <div class="form__error">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="register-form__button">
                    <button class="register-form__button-submit" type="submit">
                        登録
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>