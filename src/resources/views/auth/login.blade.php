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
            <form class="login-form" action="/login" method="post">
                @csrf
                <div class="login-form__heading">
                    <p>Login</p>
                </div>
                <div class="login-form__group">
                    <div class="login-form__group-title">
                        <span>Email</span>
                    </div>
                    <div class="login-form__group-content">
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
                <div class="login-form__group">
                    <div class="login-form__group-title">
                        <span>Password</span>
                    </div>
                    <div class="login-form__group-content">
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
                <div class="login-form__button">
                    <button class="login-form__button-submit" type="submit">
                        ログイン
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>