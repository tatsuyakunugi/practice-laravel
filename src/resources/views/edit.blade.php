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
            <div class="status">
                <p>現在の予約状況</p>
            </div>
            <div class="shop-card">
                <div class="container">
                   <img src="{{ Storage::url($reservation->shop->shop_image_path) }}" alt="">
                </div>
            </div>
            <div class="container">
                <p>Shop</p>
                <p>{{ $reservation->shop->shop_name }}</p>
            </div>
            <div class="container">
                <p>Date</p>
                <p>{{ $reservation->reservation_day }}</p>
            </div>
            <div class="container">
                <p>Number</p>
                <p>{{ $reservation->number_of_people }}</p>
            </div>
        </div>
        <livewire:reservation-edit :reservation="$reservation">
    </main>
    @livewireScripts
</body>
</html>