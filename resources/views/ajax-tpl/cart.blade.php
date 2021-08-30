@foreach($options as $option)
    <li class="row-modal-add-to-cart">
        <img src="{{ $option->attributes->img  }}" alt="" width="120" height="160" class="img-modal-add-to-cart">
        <div class="description-modal-add-to-cart">
            <h4 class="product-name-modal-add-to-cart">{{ $option->name }}</h4>
{{--            <div class="product-brand-modal-add-to-cart">Бренд: Tesoro</div>--}}
            <div class="product-size-modal-add-to-cart">Размер: {{ $option->attributes->size  }}</div>
            <div class="product-color-modal-add-to-cart">
                Цвет: <span class="product-color-modal-add-to-cart-color" style="background-color: {{ $option->attributes->meaning  }}"></span> {{ $option->attributes->color  }}
            </div>
            <div class="product-qty-modal-add-to-cart">Количество: {{ $option->quantity }}шт</div>
        </div>
        <div class="product-action-modal-add-to-cart">
            <form action="{{ route('cart.remove-from-cart', $option->id)}}" method="post" class="float-left">
                @csrf
                @method('DELETE')
                <button type="submit" class="remove-product-modal-add-to-cart"   onclick="return confirm('Подтвердите удаление')">
                    @include('svg.modal-cart')
                </button>
            </form>
{{--            <a href="{{ route('remove-from-cart', $option->id)}}" class="remove-product-modal-add-to-cart">@include('svg.modal-cart')</a>--}}
            <div class="product-price-modal-add-to-cart">{{ $option->price }} грн.</div>
        </div>
    </li>
@endforeach
