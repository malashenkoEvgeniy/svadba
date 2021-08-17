@if(count($data))
<section class="products">
    <div class="products-block">
        <h2 class="products-title page-title">
            @if($sign == 'is_promotion')
                @lang('main.promotion_product')
            @else
                @lang('main.similar_product')
            @endif</h2>
        <ul class="products-list">
            @foreach($data as $product)
                @widget('product', ['model'=> $product])

            @endforeach
        </ul>
    </div>
</section>
@endif
