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
            <div class="thanks">
                @if(Session::has('error'))
                <div class="error">
                    <p>{{ session('error') }}</p>
                </div>
                @else(Session::has('message'))
                <div class="sucsess">
                    <p>{{ session('message') }}</p>
                </div>
                <div class="login__link">
                    <a href="/login">ログインする</a>
                </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>