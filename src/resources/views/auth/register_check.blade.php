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
                <a class="link" href="/">✕</a>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="content">
            <form class="register-form" action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
                    <div class="col-md-6">
                        <span class="">{{$name}}</span>
                        <input type="hidden" name="email" value="{{$name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
                    <div class="col-md-6">
                        <span class="">{{$email}}</span>
                        <input type="hidden" name="email" value="{{$email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
                    <div class="col-md-6">
                        <span class="">{{$password_mask}}</span>
                        <input type="hidden" name="password" value="{{$password}}">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            仮登録
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>