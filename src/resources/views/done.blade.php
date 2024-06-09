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
        @if(Auth::check())
        <div class="detail__content">
            <div class="shop-card">
                <div class="container">
                   <img src="{{ Storage::url($shop->shop_image_path) }}" alt="">
                </div>
            <div class="container">
                <p>{{ $shop->shop_name }}</p>
            </div>
            <div class="container">
                <p>{{ $reservationDate }}</p>
            </div>
            <div class="container">
                <p>{{ $reservationTime }}</p>
            </div>
            <div class="container">
                <p>{{ $number_of_people }}</p>
            </div>
        </div>
        @endif    
    </main>
</body>
</html>