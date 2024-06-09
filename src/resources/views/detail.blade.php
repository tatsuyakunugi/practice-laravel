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
                <a class="link" href="/menu">Rese</a>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="detail__content">
            <div class="shop-card">
                <div class="container">
                   <img src="{{ Storage::url($shop->shop_image_path) }}" alt="">
                </div>
            <div class="container">
                <p>{{ $shop->shop_name }}</p>
            </div>
            <div class="container">
                <p>#{{ $shop->area->area_name }}</p>
            </div>
            <div class="container">
                <p>#{{ $shop->genre->genre_name }}</p>
            </div>
            <div class="container">
                <p>{{ $shop->content }}</p>
            </div>
            </div>
        </div>
        <livewire:select :shop="$shop">
    </main>
    @livewireScripts
</body>
</html>