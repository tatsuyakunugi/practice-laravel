@if(Auth::check())
<div class="reservation-card">
    <form class="reservation-form" action="/done" method="get">
        <div class="reservation-title">
            <p>予約</p>
        </div>
        <div class="select__reservation-date">
            <input type="date" wire:model.lazy="date" name="date">
        </div>
        <div class="reservation-time">
            <select class="select__time" wire:model.lazy="time" name="time" id="time">
                <option>選択してください</option>
                @for($i = 10; $i <= 21; $i++)
                    @for($j = 0; $j <= 5; $j++)
                    <option>{{ $i }}:{{ $j }}0</option>
                    @endfor
                @endfor
            </select>
        </div>
        <div class="number_of_people">
            <select class="select__number_of_people" wire:model.lazy="number_of_people" name="number_of_people" id="number_of_people">
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
    <div class="select-result">
        <div class="select-result__inner">
            <div class="select-result__group">
                <div class="title">
                    <span>Shop</span>
                </div>
            <div class="select">
                <p>{{ $shop->shop_name }}</p>
            </div>
        </div>
        <div class = "select-result__gorup">
            <div class="title">
                <span>Date</span>
            </div>
            <div class="select">
                <p>{{ $date }}</p>
            </div>
        </div>
        <div class = "select-result__gorup">
            <div class="title">
                <span>Time</span>
            </div>
            <div class="select">
                <p>{{ $time }}</p>
            </div>
        </div>
        <div class = "select-result__gorup">
            <div class="title">
                <span>Number</span>
            </div>
            <div class="select">
                <p>{{ $number_of_people }}</p>
            </div>
        </div>
    </div>
</div>
@else
<div class="reservation-card">
    <form class="reservation-form" action="/done" method="get">
        <div class="reservation-title">
            <p>予約</p>
        </div>
        <div class="select__reservation-date">
            <input type="date" wire:model.lazy="date" name="date" disabled>
        </div>
        <div class="reservation-time">
            <select class="select__time" wire:model.lazy="time" name="time" id="time" disabled>
                <option>選択してください</option>
                @for($i = 10; $i <= 21; $i++)
                    @for($j = 0; $j <= 5; $j++)
                    <option>{{ $i }}:{{ $j }}0</option>
                    @endfor
                @endfor
            </select>
        </div>
        <div class="number_of_people">
            <select class="select__number_of_people" wire:model.lazy="number_of_people" name="number_of_people" id="number_of_people" disabled>
                <option>選択してください</option>
                @for($i = 1; $i <= 30; $i++)
                <option>{{ $i }}人</option>
                @endfor
            </select>
        </div>
        <div class="reservation-form__button">
            <input type="hidden" name="shop_id" value="{{ $shop->id }}" disabled>
            <button class="reservation-form__button-submit" type="submit" disabled>予約する</button>
        </div>    
    </form>
    <div class="select-result">
        <div class="select-result__inner">
            <div class="select-result__group">
                <div class="title">
                    <span>Shop</span>
                </div>
            <div class="select">
                <p>{{ $shop->shop_name }}</p>
            </div>
        </div>
        <div class = "select-result__gorup">
            <div class="title">
                <span>Date</span>
            </div>
            <div class="select">
                <p>{{ $date }}</p>
            </div>
        </div>
        <div class = "select-result__gorup">
            <div class="title">
                <span>Time</span>
            </div>
            <div class="select">
                <p>{{ $time }}</p>
            </div>
        </div>
        <div class = "select-result__gorup">
            <div class="title">
                <span>Number</span>
            </div>
            <div class="select">
                <p>{{ $number_of_people }}</p>
            </div>
        </div>
    </div>
</div>
@endif