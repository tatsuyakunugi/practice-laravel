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
            <div class="link__groupe">
                <div class="home__link">
                    <a href="/">Home</a>
                </div>
                <div class="registration__link">
                    <a href="/register">Registration</a>
                </div>
                <div class="login__link">
                    <a href="/login">Login</a>
                </div>
                @if(Auth::check())
                <div class="maypage__link">
                    <a href="/mypage">Mypage</a>
                </div>
                <div class="logout__link">
                    <form action="/logout" method="post">
                        @csrf
                        <button>Logout</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>