<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    @livewireStyles
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
            <livewire:select :shop="$shop">
        </div>
    </main>
    @livewireScripts
</body>
</html>