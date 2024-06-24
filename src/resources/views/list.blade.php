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
        <div class="list__content">
            <dev class="alert">
                @if(session('error'))
                <div class="alert__danger">
                    {{ session('error') }}
                </div>
                @endif
            </dev>
            <div class="list__content--inner">
                @foreach($reviews as $review)
                <h2 class="shop-name">
                    <p>{{ $review->shop->shop_name }}</p>
                </h2>
                <div class="review-card">
                    <div class="review-card__heading">
                        <div class="user-name">
                            <label for="">お名前</label>
                            <p>{{ $review->user->name }}さん</p>
                        </div>
                    </div>
                    <div class="review-card__group">
                        <div class="rating">
                            <label for="">評価</label>
                            <p>{{ $review->rating }}</p>
                        </div>
                    </div>
                    <div class="review-card__group">
                        <div class="comment">
                            <label for="">コメント</label>
                            <p>{{ $review->comment }}</p>
                        </div>
                    </div>
                    <div class="posted-date">
                        <label for="">投稿日</label>
                        <p>{{ ($review->created_at)->format('Y-m-d') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="link">
            <a href="/">戻る</a>
        </div>
    </main>
</body>
</html>