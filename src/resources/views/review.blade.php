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
                <a class="link" href="/menu">Rese</a>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="complete-message">
            @if(Session::has('message'))
            <p>{{ session('message') }}</p>
            @endif
        </div>
        <div class="link">
            <a href="/">戻る</a>
        </div>
    </main>
</body>
</html>