
@if($services)
<section class="catalog">
    <h2 class="catalog-title">@lang('main.services')</h2>
    <ul class="catalog-list">
        @foreach($services as $service)
        <li class="catalog-item" >
            <a href="{{route('page.view', ['slug'=>$service->slug])}}" class="catalog-link" style="background-image: url(
            @if(count($service->attachments))
            {{$service->attachments[0]->img_d}}
            @endif">
            </a>
            <a href="{{route('page.view', ['slug'=>$service->slug])}}" class="catalog-item-title">
               {{$service->translate()->title}}
            </a>

        </li>
        @endforeach
    </ul>
</section>
@endif
