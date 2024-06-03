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
            <div class="header-item">
                <form class="search-form" action="{{ route('shop.index') }}" method="get">
                    @csrf
                    <div class="form-group">
                        <select class="area-select" name="area_id" id="area_id">
                            <option value="">All area</option>
                            @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="genre-select" name="genre_id" id="genre_id">
                            <option value="">All genre</option>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="keyword" value="{{ $keyword }}" placeholder="Search...">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="検索">
                    </div>
                </form>
            </div>
        </div>
    </header>
    <main class="main">
    <div class="shop-wrapper">
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
        <div class="container">
            <p>{{ $shop->content }}</p>
        </div>
        @if(Auth::check())
        <div class="shop-control">    
            @if(!Auth::user()->is_like($shop->id))
            <form class="like-form" action="{{ route('likes.store', $shop) }}" method="post">
                @csrf
                <!--<input type="hidden" name="shop_id" value="{{ $shop->id }}">-->
                <button class="like-button" type="submit">お気に入り登録</button>
            </form>
            @else
            <form class="like-form" action="{{ route('likes.destroy', $shop) }}" method="post">
                @csrf
                @method('DELETE')
                <!--<input type="hidden" name="shop_id" value="{{ $shop->id }}">-->
                <button class="unlike-button" type="submit">お気に入り解除</button>
            </form>
            @endif
        </div>
        @endif
        @endforeach
    </div>
    </main>
</body>
</html>