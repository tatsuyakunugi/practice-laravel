<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('image_upload') }}" method="post" class="create-form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="shop_image" class="input_label">画像</label>
            <input type="file" class="input_form" name="shop_image">
        </div>
        <button type="submit">登録</button>
    </form>
    <div class="todo__alert">
        <div class="todo__alert--success">
            {{ session('message') }}
        </div>
    </div>
</body>
</html>