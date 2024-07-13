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
        <div class="review__content">
            <div class="review__content--heading">
                <div class="comment">
                    <p>この度はご来店ありがとうございました。</p>
                    <p>よろしければアンケートにご協力ください。</p>
                </div>
            </div>
            <div class="review__content--inner">
                <div class="shop-card">
                    <div class="container">
                        <img src="{{ Storage::url($reservation->shop->shop_image_path) }}" alt="">
                    </div>            
                    <div class="container">
                        <p>ご利用店舗{{ $reservation->shop->shop_name }}</p>
                    </div>
                    <div class="container">
                        <p>ご利用日時{{ $reservation->reservation_day}}</p>
                    </div>
                </div>
                <div class="review-card">
                    <form class="review-form" action="{{ route('reviews.store') }}" method="post">
                    @csrf
                        <div class="form__group">
                            <div class="select__rating">
                                <input id="star5" type="radio" name="rating" value="5">
                                <label for="star5">★5</label>
                                <input id="star4" type="radio" name="rating" value="4">
                                <label for="star4">★4</label>
                                <input id="star3" type="radio" name="rating" value="3">
                                <label for="star3">★3</label>
                                <input id="star2" type="radio" name="rating" value="2">
                                <label for="star2">★2</label>
                                <input id="star1" type="radio" name="rating" value="1">
                                <label for="star1">★1</label>
                            </div>
                            <div class="form__error">
                                @error('rating')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form__group">
                            <div class="input__comment">
                                <textarea name="comment"></textarea>
                            </div>
                            <div class="form__error">
                                @error('comment')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="alert">
                            @if(session('error'))
                            {{ session('error') }}
                            @endif
                        </div>
                        <div class="review-form__button">
                            <input type="hidden" name="shop_id" value="{{ $reservation->shop->id }}">
                            <button class="review-form__button-submit" type="submit">レビューを投稿する</button>
                        </div>
                    </form>
                </div>
            </div>    
        </div>      
    </main>
</body>
</html>