<header class="header">
    <nav class="header-nav">
        <ul class="nav-list">
            <li class="nav-item nav-item-burger">
                <button class="btn-menu-burger">
                    @include('svg.burger')
                </button>
            </li>
            <li class="nav-item nav-item-logo">
                <a href="/" class="nav-item-logo-link">
                    <img src="{{ $h_contacts->logo}}" alt="" class="nav-item-logo-img" width="214" height="84">
                </a>
            </li>
            <li class="nav-item nav-item-nav-menu">
                <ul class="nav-menu-list">
                    <li class="nav-menu-item nav-item-burger burger-close-btn">
                        <button class="nav-item-burger-close">
                            @include('svg.burger-close')
                        </button>
                    </li>
                    @foreach( $h_pages as $page)
                        @if( $page->slug == 'katalog')
                            <li class="nav-menu-item">
                                <a href="{{route('page.view', ['slug'=>$page->slug])}}" class="nav-menu-link nav-menu-link-catalog">
                                    <span>{{ $page->translate()->title}}</span>
                                    <button class="btn-menu-arrow"> @include('svg.back')</button>
                                </a>
                                <div class="sub-catalog-menu">
                                    <a href="#" class="nav-menu-back">
                                        <div class="btn-menu-back">
                                            @include('svg.back')
                                        </div>
                                        <span>{{ $page->translate()->title}}</span>
                                    </a>
                                    <ul class="sub-catalog-list">
                                        @foreach( $h_categories as $category)
                                        <li class="sub-catalog-item">
                                            <a href="{{route('page.category.view', ['slug'=>$category->slug])}}" class="sub-catalog-link active">
                                                <span>{{ $category->translate()->title}}</span>
                                                <button class="btn-menu-arrow">
                                                    @include('svg.arrow')
                                                </button>
                                            </a>
                                            @if(count($category->children))
                                            <ul class="unit-list active">
                                                @foreach( $category->children as $subcategory)
                                                <li class="unit-item">
                                                    <a href="{{ route('page.category.view', ['slug'=>$subcategory->slug])}}" class="unit-link">{{ $subcategory->translate()->title}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @elseif( $page->slug == 'uslugi')
                            <li class="nav-menu-item">
                                <a href="{{ route('page.view', ['slug'=>$page->slug])}}" class="nav-menu-link nav-menu-link-service">
                                    <span>{{ $page->translate()->title}}</span>
                                    <button class="btn-menu-arrow">
                                        @include('svg.arrow')
                                    </button>
                                </a>
                                <div class="sub-service-menu">
                                    <a href="#" class="nav-menu-back">
                                        <div class="btn-menu-back">
                                            @include('svg.back')
                                        </div>
                                        <span>{{ $page->translate()->title}}</span>
                                    </a>
                                    <ul class="sub-service-list">
                                        @foreach( $page->children as $subpage)
                                        <li class="sub-service-item">
                                            <a href="{{ route('page.view', ['slug'=>$subpage->slug])}}" class="sub-service-link">
                                                <span>{{ $subpage->translate()->title}}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @else
                        <li class="nav-menu-item">
                            <a href="{{ route('page.view', ['slug'=>$page->slug])}}" class="nav-menu-link">{{ $page->translate()->title}}</a>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </li>
            <li class="nav-item nav-item-search">
                <form class="search-form search-input-close" action="{{route('search')}}">
                    <select class="livesearch form-control" name="q"></select>
                    <div class="result-block">
                        <ul class="result-list">

                        </ul>
                    </div>
{{--                    <input id="search" placeholder="Введите название платья или бренда" name="q" type="text" >--}}
                    <button type="submit" class="search-form-btn">
                        @include('svg.search')
                    </button>
                </form>

                <button class="search-form-btn-open">
                    @include('svg.search')
                </button>
            </li>
            <li class="nav-item nav-item-nav-cart">
                <a href="#" class="nav-item-cart-btn">
                    @include('svg.cart')
                </a>
                <div class="counter-orders">{{ \Cart::session($_COOKIE['cart_id'])->getTotalQuantity() }}</div>
                <div class="counter-orders1">{{ \Cart::session($_COOKIE['cart_id'])->getTotal() }}</div>
            </li>
{{--            <li class="nav-item nav-item-temp-cart">--}}
{{--                <a href="{{ route('cart.index') }}" class="nav-item-temp-cart-btn">--}}
{{--                    Корзина временно--}}
{{--                </a>--}}
{{--                <div class="counter-orders">10</div>--}}
{{--            </li>--}}
        </ul>
    </nav>
</header>
