<form action="" class="feedback-form-form">
    <div class="feedback-form-lavel feedback-form-first-lavel">
        <div class="input-block">
            <label for="name">Имя<span>*</span></label>
            <input type="text" id="name">
        </div>
        <div class="input-block">
            <label for="phone">Телефон<span>*</span></label>
            <input type="text" id="phone">
        </div>
    </div>
    <div class="feedback-form-lavel feedback-form-second-lavel">
        <div class="input-block">
            <label for="date">Дата<span>*</span></label>
            <input type="date" id="date">
        </div>
        <div class="input-block">
            <label for="time-appointment">Время<span>*</span></label>
            <select type="text" id="time-appointment">
                <option value="">10:00 - 11:00</option>
                <option value="">11:00 - 12:00</option>
                <option value="">12:00 - 13:00</option>
                <option value="">13:00 - 14:00</option>
                <option value="">14:00 - 15:00</option>
                <option value="">15:00 - 16:00</option>
                <option value="">16:00 - 17:00</option>
                <option value="">18:00 - 19:00</option>
                <option value="">19:00 - 20:00</option>
            </select>
        </div>
        <div class="input-block">
            <label for="address">Адрес салона<span>*</span></label>
            <select type="text" id="address">
                <option value="">ул. Шевченко 1</option>
                <option value="">ул. Шевченко 10</option>
                <option value="">ул. Шевченко 100</option>
                <option value="">ул. Шевченко 1000</option>
            </select>
        </div>
    </div>
    <div class="input-block">
        <label for="description">Сообщение</label>
        <textarea type="date" id="description"></textarea>
    </div>
    <button class="btn" type="submit">Записаться</button>
</form>
