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
        <div class="main__heading">
            <div class="user_name">
                <p>{{ $user->name }}さん</p>
            </div>
        </div>
        @if(empty($reservations))
        <div class="message">
            <p>予約はありません</p>
        </div>
        @else
        @foreach($reservations as $reservation)
        <div class="reservation-wrapper">
            <div class="reservation-wrapper__title">
                <p>予約状況</p>
            </div>
            <div class="reservation-card">
                <div class="card__header">
                    <div class="card__title">
                        <p>予約</p>
                    </div>
                    <div class="update-form">
                        <div class="reservation-control">
                            <a class="edit__link" href="{{ route('reservations.edit', $reservation->id)}}">予約内容変更</a>
                        </div>
                    </div>
                    <div class="delete-form">
                        <form action="{{ route('reservations.destroy') }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" value="{{ $reservation->id }}">
                            <button class="form__button-submit">予約取り消し</button>
                        </form>
                    </div>
                </div>
                <div class="select-result">
                    <div class="select-result__inner">
                        <div class="select-result__group">
                            <div class="title">
                                <span>Shop</span>
                            </div>
                            <div class="select">
                                <p>{{ $reservation->shop->shop_name }}</p>
                            </div>
                        </div>
                        <div class = "select-result__gorup">
                            <div class="title">
                                <span>Date</span>
                            </div>
                            <div class="select">
                                <p>{{ $reservation->reservation_date }}</p>
                            </div>
                        </div>
                        <div class = "select-result__gorup">
                            <div class="title">
                                <span>Time</span>
                            </div>
                            <div class="select">
                                <p>{{ $reservation->reservation_time }}</p>
                            </div>
                        </div>
                        <div class = "select-result__gorup">
                            <div class="title">
                                <span>Number</span>
                            </div>
                            <div class="select">
                                <p>{{ $reservation->number_of_people }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    <div class="shop-wrapper">
        @if(empty($shops))
        <div class="message">
            <p>お気に入りの店舗はありません</p>
        </div>
        @else
        @foreach ($shops as $shop)
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
        <div class="shop-control">    
            @if(!Auth::user()->is_like($shop->id))
            <form class="like-form" action="{{ route('likes.store', $shop) }}" method="post">
                @csrf
                <button class="like-button" type="submit">お気に入り登録</button>
            </form>
            @else
            <form class="unlike-form" action="{{ route('likes.destroy', $shop) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="unlike-button" type="submit">お気に入り解除</button>
            </form>
            @endif
        </div>
        <div class="shop-control">
            <a class="detail__link" href="/detail/{{ $shop->id }}">詳しく見る</a>
        </div>
        @endforeach
        @endif
    </div>
    </main>
</body>
</html>