<div class="modal-btn-filter">
    <div class="modal-btn-filter-header">
        <h3 class="modal-btn-filter-title">@lang('main.filter')</h3>
        <button class="filter-modal-btn-close">@include('svg.filter-close')</button>
    </div>
    <form action="{{ route('page.category.view', ['slug'=>$rubric->slug]) }}" class="filter-form" id="filter-form" name="filters-form">
        @if(count($brands))
        <fieldset>
            <legend>@lang('main.brand')</legend>
            <div class="group-inputs">
                @foreach($brands as $brand)
                <div class="group-input">
                    <input type="checkbox" id="brand{{$brand->id}}" name="brand[]" value="{{$brand->id}}">
                    <label for="brand{{$brand->id}}">{{$brand->translate()->title}}</label>
                </div>
                @endforeach
            </div>
            <button class="filter-show-more">+ показать больше</button>
        </fieldset>
        @endif
        @if(count($colors))
        <fieldset>
            <legend>Цвет</legend>
            <div class="group-inputs">
                @foreach($colors as $color)
                <div class="group-input">
                    <input type="checkbox" id="color{{$color->id}}" name="color[]" value="{{$color->id}}">
                    <label for="color{{$color->id}}">{{$color->translate()->title}}</label>
                </div>
                @endforeach
            </div>
            <button class="filter-show-more">+ показать больше</button>
        </fieldset>
        @endif
        @if($rubric->id !== 3)
            @if($rubric->parent_id !== 3)
                @if(count($silhouettes))
                <fieldset>
                    <legend>Силуэт</legend>
                    <div class="group-inputs group-inputs-silhouette">
                        @foreach($silhouettes as $silhouette)
                        <div class="group-input">
                            <label for="silhouette{{$silhouette->id}}"><img src="{{$silhouette->scheme}}" alt=""></label>
                            <input type="checkbox" id="silhouette{{$silhouette->id}}" name="silhouette[]"  value="{{$silhouette->id}}">
                            <label for="silhouette{{$silhouette->id}}">{{$silhouette->translate()->title}}</label>
                        </div>
                        @endforeach
                </fieldset>
                @endif
            @endif
        @endif
        @if($rubric->id !== 3)
            @if($rubric->parent_id !== 3)
                @if(count($textiles))
                    <fieldset>
                        <legend>Ткань</legend>
                        <div class="group-inputs">
                            @foreach($textiles as $textile)
                                <div class="group-input">
                                    <input type="checkbox" id="textile{{$textile->id}}" name="textile[]" value="{{$textile->id}}">
                                    <label for="textile{{$textile->id}}">{{$textile->translate()->title}}</label>
                                </div>
                            @endforeach
                        </div>
                        <button class="filter-show-more">+ показать больше</button>
                    </fieldset>
                @endif
            @endif
        @endif
        @if(count($sizes))
        <fieldset>
            <legend>Размер</legend>
            <div class="group-inputs">
                @foreach($sizes as $size)
                    <div class="group-input">
                        <input type="checkbox" id="size{{$size->id}}" name="size[]" value="{{$size->id}}">
                        <label for="size{{$size->id}}">{{$size->size}}</label>
                    </div>
                @endforeach
            </div>
            <button class="filter-show-more">+ показать больше</button>
        </fieldset>
        @endif

            <fieldset>
                <div class="filters__item filters-price">
                    <h3 class="filters-price__title">Цена</h3>
                    <div class="filters-price__inputs">
                        <label class="filters-price__label">
                            <input type="number" min="100" max="50000" placeholder="100" name="pricemin" class="filters-price__input" id="input-0">
                        </label>
                        <label class="filters-price__label">
                            <input type="number" min="100" max="50000" placeholder="50000" name="pricemax" class="filters-price__input" id="input-1">
                        </label>
                        <button type="submit" class="filter-submit">OK</button>
                    </div>
                    <div class="filters-price__slider" id="range-slider"></div>

                </div>
            </fieldset>
    </form>
</div>
