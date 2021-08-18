<li class="products-item">
    @if($model->is_promotion == 1) <img src="{{asset('site/img/prom-sticker.png')}}" class="promotions-sticker"> @endif
    @if($model->is_new == 1) <img src="{{asset('site/img/new-sticker.png')}}" alt="" class="new-sticker"> @endif
    @if($model->is_collection == 1)  <img src="{{asset('site/img/collection-sticker.png')}}" alt="" class="collection-sticker"> @endif

    <a href="{{route('page.view', ['slug'=>$model->slug])}}" class="products-link ">
        @if(count($model->attachments))
            <img src="{{$model->attachments[0]->img_d}}" data-old="{{$model->attachments[0]->img_d}}" data-change="{{ asset('site/img/item4.jpg')}}" alt="" class="products-img">
        @endif

        <h3 class="products-link-title">{{$model->translate()->title}}</h3>
        <div class="products-price">
            <span class="products-new-price">{{$model->new_price}} грн.</span>
            <span class="products-old-price">{{$model->price}} грн.</span>
        </div>
    </a>
</li>
