
@if($categories)
<section class="catalog">
    <h2 class="catalog-title">@lang('main.catalog')</h2>
    <ul class="catalog-list">
        @foreach($categories as $category)
        <li class="catalog-item" >
            <a href="#" class="catalog-link" style="background-image: url(
            @if(count($category->attachments))
            {{$category->attachments[0]->img_d}}
            @endif
            )">
                        <span>
                           {{$category->translate()->title}}
                        </span>
            </a>
        </li>
        @endforeach
    </ul>
</section>
@endif
