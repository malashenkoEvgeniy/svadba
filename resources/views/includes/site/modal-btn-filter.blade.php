<div class="modal-btn-filter">
    <div class="modal-btn-filter-header">
        <h3 class="modal-btn-filter-title">@lang('main.filter')</h3>
        <button class="filter-modal-btn-close"><i class="fas fa-times"></i></button>
    </div>
    <form action="" class="filter-form">
        @if(count($brands))
        <fieldset>
            <legend>@lang('main.brand')</legend>
            <div class="group-inputs">
                @foreach($brands as $brand)
                <div class="group-input">
                    <input type="checkbox" id="brand{{$brand->id}}" value="{{$brand->id}}">
                    <label for="brand{{$brand->id}}">{{$brand->translate()->title}}</label>
                </div>
                @endforeach
            </div>
            <button class="filter-show-more">+ показать меньше</button>
        </fieldset>
        @endif
        @if(count($colors))
        <fieldset>
            <legend>Цвет</legend>
            <div class="group-inputs">
                @foreach($colors as $color)
                <div class="group-input">
                    <input type="checkbox" id="color{{$color->id}}" value="{{$color->id}}">
                    <label for="color{{$color->id}}">{{$color->translate()->title}}</label>
                </div>
                @endforeach
            </div>
            <button class="filter-show-more">+ показать меньше</button>
        </fieldset>
        @endif
        @if(count($silhouettes))
        <fieldset>
            <legend>Силуэт</legend>
            <div class="group-inputs group-inputs-silhouette">
                @foreach($silhouettes as $silhouette)
                <div class="group-input">
                    <label for="silhouette{{$silhouette->id}}"><img src="{{$silhouette->scheme}}" alt=""></label>
                    <input type="checkbox" id="silhouette{{$silhouette->id}}" value="{{$silhouette->id}}">
                    <label for="silhouette{{$silhouette->id}}">{{$silhouette->translate()->title}}</label>
                </div>
                @endforeach
        </fieldset>
        @endif
        @if(count($textiles))
        <fieldset>
            <legend>Ткань</legend>
            <div class="group-inputs">
                @foreach($textiles as $textile)
                    <div class="group-input">
                        <input type="checkbox" id="textile{{$textile->id}}" value="{{$textile->id}}">
                        <label for="textile{{$textile->id}}">{{$textile->translate()->title}}</label>
                    </div>
                @endforeach
            </div>
            <button class="filter-show-more">+ показать меньше</button>
        </fieldset>
        @endif
        @if(count($sizes))
        <fieldset>
            <legend>Размер</legend>
            <div class="group-inputs">
                @foreach($sizes as $size)
                    <div class="group-input">
                        <input type="checkbox" id="size{{$size->id}}" value="{{$size->id}}">
                        <label for="textile{{$size->id}}">{{$size->size}}</label>
                    </div>
                @endforeach
            </div>
            <button class="filter-show-more">+ показать меньше</button>
        </fieldset>
        @endif
        <fieldset>

            <legend>Цена</legend>
            <div class="polzunok-container">
                <div class="polzunok-wrapper">
                    <input type="number" class="polzunok-input-left" min="0" max="50000" step="500" value="0">
                    <span>-</span>
                    <input type="number" class="polzunok-input-left" min="0" max="50000" step="500" value="25000">
                </div>
                <div class="polzunok">
                    <span class="polzunok-indecator polzunok-indecator-min"></span>
                    <span class="polzunok-indecator polzunok-indecator-max"></span>
                </div>
            </div>
        </fieldset>
        <fieldset>

            <legend>Цена</legend>
            <div class="polzunok-container">
                <input type="text" class="js-range-slider" name="my_range"

                       data-min="0"
                       data-max="1000"
                       data-from="200"
                       data-to="500"
                />
            </div>
        </fieldset>
            <fieldset>

                <legend>Цена</legend>
                <div class="polzunok-container">
                    <div class="slider-non-linear-step"></div>
                </div>
            </fieldset>
    </form>
</div>
