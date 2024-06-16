<div class="reservation-card">
    <form class="reservation-form" action="{{ route('reservations.update') }}" method="post">
        @csrf
        @method('PUT')
        <div class="reservation-title">
            <p>予約変更</p>
        </div>
        <div class="select__reservation-date">
            <input type="date" wire:model.lazy="date" name="date">
        </div>
        <div class="form__error">
            @error('date')
            {{ $message }}
            @enderror
        </div>
        <div class="reservation-time">
            <select class="select__time" wire:model.lazy="time" name="time" id="time">
                <option value="">選択してください</option>
                @for($i = 10; $i <= 21; $i++)
                    @for($j = 0; $j <= 5; $j++)
                    <option value="{{ $i }}:{{ $j }}0">{{ $i }}:{{ $j }}0</option>
                    @endfor
                @endfor
                <option value="22:00">22:00</option>
            </select>
        </div>
        <div class="form__error">
            @error('time')
            {{ $message }}
            @enderror
        </div>
        <div class="number_of_people">
            <select class="select__number_of_people" wire:model.lazy="number_of_people" name="number_of_people" id="number_of_people">
                <option value="">選択してください</option>
                @for($i = 1; $i <= 30; $i++)
                <option value="{{ $i }}人">{{ $i }}人</option>
                @endfor
            </select>
        </div>
        <div class="form__error">
            @error('number_of_people')
            {{ $message }}
            @enderror
        </div>
        <dev class="alert">
            @if(session('error'))
            <div class="alert__danger">
                {{ session('error') }}
            </div>
            @endif
        </dev>
        <div class="reservation-form__button">
            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
            <button class="reservation-form__button-submit" type="submit">予約内容を変更する</button>
        </div>    
    </form>
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
</div>