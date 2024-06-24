{{ $user->name }}様

いつも「Rese」ご利用していただきありがとうございます。
ご予約していただいた来店日が本日となりましたので、再度ご連絡させていただきます。

＜ご予約情報＞
店名 {{$user->reservation->shop->shop_name}}
ご予約日時 {{ $user->reservation->reservation_day}}
ご来店人数 {{ $user->reservation->number_of_people}}

是非素敵な時間をお過ごしください。