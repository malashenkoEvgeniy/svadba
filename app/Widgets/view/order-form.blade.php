<form action="" id="order-form">
    <div class="order-form-first order-form-level1 order-form-level active">
        <div class="input-block">
            <label for="name">Имя<span>*</span></label>
            <input type="text" id="name" name="name" class="el-input invalid" autofocus="autofocus" required>
        </div>
        <div class="input-block">
            <label for="surname">Фамилия<span>*</span></label>
            <input type="text" id="surnamename" class="el-input invalid" required>
        </div>
        <div class="input-block">
            <label for="phone">Телефон<span>*</span></label>
{{--            <input type="text" id="phone">--}}
            <input type="tel" class="form-control el-input invalid" id="phone" name="phone" placeholder="Телефон в формате (XXX)XXX-XX-XX" pattern="\(\d{3}\)\d{3}-\d{2}-\d{2}" required>
        </div>
        <div class="input-block">
            <a href="#" class="btn-next-order btn-order1" data-order="2">Далее</a>
        </div>

    </div>
    <div class="order-form-second order-form-level2 order-form-level">
        <div class="order-form-second-wrap">
            <legend>Выберите способ доставки</legend>
            <div class="input-block-radio">
                <input type="radio" name="delivery" checked id="pickup"><label for="pickup">Самовывоз с магазина (возможна примерка)</label>
            </div>
            <div class="input-pickup active">
                <label for="address">Адрес салона<span>*</span></label>
                <select type="text" id="address" name="address" required>
                    <option value="">Выбирите адрес</option>
                    <option value="ул. Шевченко 1">ул. Шевченко 1</option>
                    <option value="ул. Шевченко 10">ул. Шевченко 10</option>
                    <option value="ул. Шевченко 100">ул. Шевченко 100</option>
                    <option value="ул. Шевченко 1000">ул. Шевченко 1000</option>
                </select>
            </div>
            <div class="input-block-radio">
                <input type="radio" name="delivery" id="new_post"><label for="new_post">Новая почта</label>
            </div>
            <div class="new-post-order-block">
                <div class="input-block ">
                    <label for="area_np">Область<span>*</span></label>
                    <select type="text" id="area_np" name="area">
                        <option value="">Выбирите область</option>
                        @foreach($areasNP as $area)
                            <option value="{{$area->ref}}">{{$area->description_ru}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-block">
                    <label for="surname">Населенныйи пункт<span>*</span></label>
                    <input type="text" id="surnamename">
                </div>
                <div class="input-block">
                    <label for="surname">Укажите отделение<span>*</span></label>
                    <input type="text" id="surnamename">
                </div>
            </div>
            <div class="input-block-radio">
                <input type="radio" name="delivery" id="courier"><label for="courier">Курьер по Киеву</label>
            </div>
            <div class="input-block courier-input">
                <label for="surname">Укажите отделение<span>*</span></label>
                <input type="text" id="surnamename">
            </div>
        </div>
        <div class="order-form-btn-wrap">
            <a href="#" class="btn-prev-order btn-order" data-order="1">Назад</a>
            <a href="#" class="btn-next-order btn-order2" data-order="3">Далее</a>
        </div>

    </div>
    <div class="order-form-level3 order-form-level">
        <div class="input-block">
            <legend>Выберите способ оплаты</legend>
            <div class="input-block-radio">
                <input type="radio" name="payment method" id="payment_upon-receipt" checked><label for="payment_upon-receipt">Оплата при получении</label>
            </div>
            <div class="input-block-radio">
                <input type="radio" name="payment method" id="bank_payment"><label class="label-payment" for="bank_payment">Оплата картой через Приват 24 @include('svg.pay')</label>
            </div>
        </div>
        <div class="order-form-btn-wrap">
            <a href="#" class="btn-prev-order btn-order" data-order="2">Назад</a>
            <a href="#" class="btn-next-order btn-order" data-order="4">Далее</a>
        </div>
    </div>
</form>
<script>
    {{--$(document).ready(function () {--}}
    {{--    $('#area_np').change(function (){--}}
    {{--        let areaRef = $(this).val();--}}
    {{--        $(function() {--}}
    {{--            $.ajax({--}}
    {{--                async: true,--}}
    {{--                crossDomain: true,--}}
    {{--                url: "https://api.novaposhta.ua/v2.0/json/",--}}
    {{--                method: "POST",--}}
    {{--                headers: {--}}
    {{--                    "content-type": "application/json",--}}
    {{--                },--}}
    {{--                processData: false,--}}
    {{--                data: {--}}
    {{--                    apiKey: "{{ \App\Services\NewPostServices::API_KEY}}",--}}
    {{--                    modelName: "AddressGeneral",--}}
    {{--                    calledMethod: "getSettlements",--}}
    {{--                    methodProperties: {--}}
    {{--                        AreaRef: areaRef--}}
    {{--                    }--}}
    {{--                }--}}
    {{--            }).done(function (response) {--}}
    {{--                console.log(response);--}}
    {{--            });--}}
    {{--        });--}}
    {{--    });--}}
    {{--});--}}

</script>
