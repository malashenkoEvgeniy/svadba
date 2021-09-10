{{--{{dd($is_autofocus)}}--}}
<form action=" {{route('form.fitting')}}" method="post" name="fitting_form" class="feedback-form-form" id="fitting-form">
    <div class="wrong_date">Вы выбрали не корректную дату. Вы не можете записаться на примерку на дату которая уже прошла!</div>
    @csrf
    <div class="feedback-form-lavel feedback-form-first-lavel">
        <div class="input-block">
            <label for="name">Имя<span>*</span></label>
            <input type="text" id="name" name="name" @if($is_autofocus == 1) autofocus="autofocus" @endif required>
        </div>
        <div class="input-block">
            <label for="phone">Телефон<span>*</span></label>
            <input type="tel" id="phone" name="phone" required >
        </div>
    </div>
    <div class="feedback-form-lavel feedback-form-second-lavel">
        <div class="input-block">
            <label for="date">Дата<span>*</span></label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="input-block">
            <label for="time-appointment">Время<span>*</span></label>
            <select type="text" id="time-appointment" name="date" required>
                <option value=""></option>
                <option value="10:00">10:00 - 11:00</option>
                <option value="11:00">11:00 - 12:00</option>
                <option value="12:00">12:00 - 13:00</option>
                <option value="13:00">13:00 - 14:00</option>
                <option value="14:00">14:00 - 15:00</option>
                <option value="15:00">15:00 - 16:00</option>
                <option value="16:00">16:00 - 17:00</option>
                <option value="18:00">18:00 - 19:00</option>
                <option value="19:00">19:00 - 20:00</option>
            </select>
        </div>
        <div class="input-block">
            <label for="address">Адрес салона<span>*</span></label>
            <select type="text" id="address" name="shop_id" required>
                <option value="">Выбирите адрес</option>
                @foreach($shops as $shop)
                    <option value="{{$shop->id}}">{{$shop->city->translate()->title}}, {{$shop->translate()->address}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="input-block">
        <label for="description">Сообщение</label>
        <textarea type="date" id="description" name="msg"></textarea>
    </div>
{{--    <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">--}}
    <button class="btn" type="submit">Записаться</button>
</form>
