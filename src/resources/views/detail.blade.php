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
        @if(Auth::check())
        <div class="reservation-card">
            <form class="reservation-form" action="/done" method="get">
                <div class="reservation-title">
                    <p>予約</p>
                </div>
                <div class="select__reservation-date">
                    <input type="date" name="date">
                </div>
                <div class="reservation-time">
                    <select class="select__time" name="time" id="time">
                        @foreach($times as $key => $time_variation)
                        <option value="{{ $key }}">{{ $time_variation }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="number_of_people">
                    <select class="select__number_of_people" name="number_of_people" id="number_of_people">
                        <option>選択してください</option>
                        @for($i = 1; $i <= 30; $i++)
                        <option>{{ $i }}人</option>
                        @endfor
                    </select>
                </div>
                <div class="reservation-form__button">
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    <button class="reservation-form__button-submit" type="submit">予約する</button>
                </div>    
            </form>
        </div>
        @endif
    </main>
</body>
</html>