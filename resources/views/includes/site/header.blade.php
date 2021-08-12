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
                    <img src="{{$contacts->logo}}" alt="" class="nav-item-logo-img">
                </a>
            </li>
            <li class="nav-item nav-item-nav-menu">
                <ul class="nav-menu-list">
                    <li class="nav-menu-item nav-item-burger burger-close-btn">
                        <button class="nav-item-burger-close">
                            @include('svg.burger-close')
                        </button>
                    </li>
                    @foreach($pages as $page)
                        @if($page->slug == 'katalog')
                            <li class="nav-menu-item">
                                <a href="{{route('page.view', ['slug'=>$page->slug])}}" class="nav-menu-link nav-menu-link-catalog">
                                    <span>{{$page->translate()->title}}</span>
                                    <button class="btn-menu-arrow"> @include('svg.back')</button>
                                </a>
                                <div class="sub-catalog-menu">
                                    <a href="#" class="nav-menu-back">
                                        <div class="btn-menu-back">
                                            @include('svg.back')
                                        </div>
                                        <span>{{$page->translate()->title}}</span>
                                    </a>




{{--                                    TODU:: Здесь закончил вчера--}}


                                    <ul class="sub-catalog-list">
                                        <li class="sub-catalog-item">
                                            <a href="#" class="sub-catalog-link active">
                                                <span>Свадебные платья</span>
                                                <button class="btn-menu-arrow">
                                                    @include('svg.arrow')
                                                </button>
                                            </a>
                                            <ul class="unit-list active">
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Naviblue  - USA</a>
                                                </li>
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Brilliance - минимализм</a>
                                                </li>
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Миди, платья для росписи</a>
                                                </li>
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Nora Naviano Italy</a>
                                                </li>
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Blunny Italy</a>
                                                </li>
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Свадебные платья больших размеров</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-catalog-item">
                                            <a href="#" class="sub-catalog-link">
                                                <span>Вечерние платья</span>
                                                <button class="btn-menu-arrow">
                                                    @include('svg.arrow')
                                                </button>
                                            </a>
                                            <ul class="unit-list">
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Naviblue  - USA</a>
                                                </li>
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Jovani USA</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-catalog-item">
                                            <a href="#" class="sub-catalog-link">
                                                <span>Аксессуары и обувь</span>
                                                <button class="btn-menu-arrow">
                                                    @include('svg.arrow')
                                                </button>
                                            </a>
                                            <ul class="unit-list">
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Диадемы, веточки, заколки для невест</a>
                                                </li>
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Пеньюары</a>
                                                </li>
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Фата для невесты</a>
                                                </li>
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Серьги длинные свадебные и вечерние</a>
                                                </li>
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Свадебные и вечерняя обувь, босоножки</a>
                                                </li>
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Шубки норковые, лебяжьи для невест</a>
                                                </li>
                                                <li class="unit-item">
                                                    <a href="#" class="unit-link">Кружевное болеро для невест</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                            </li>
                        @endif
                        <li class="nav-menu-item">
                            <a href="{{route('page.view', ['slug'=>$page->slug])}}" class="nav-menu-link">{{$page->translate()->title}}</a>
                        </li>
                    @endforeach

                    <li class="nav-menu-item">
                        <a href="#" class="nav-menu-link nav-menu-link-service">
                            <span>Услуги</span>
                            <button class="btn-menu-arrow">
                                @include('svg.arrow')
                            </button>
                        </a>
                        <div class="sub-service-menu">
                            <a href="#" class="nav-menu-back">
                                <div class="btn-menu-back">
                                    @include('svg.back')
                                </div>
                                <span>Услуги</span>
                            </a>
                            <ul class="sub-service-list">
                                <li class="sub-service-item">
                                    <a href="#" class="sub-service-link">
                                        <span>Проведение свадеб под ключ</span>
                                    </a>
                                </li>
                                <li class="sub-service-item">
                                    <a href="#" class="sub-service-link">
                                        <span>Подгон платьев по фигуре</span>
                                    </a>
                                </li>
                                <li class="sub-service-item">
                                    <a href="#" class="sub-service-link">
                                        <span>Выездные царемонии</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-menu-item">
                        <a href="#" class="nav-menu-link">Акции</a>
                    </li>
                    <li class="nav-menu-item">
                        <a href="#" class="nav-menu-link">Доставка и оплата</a>
                    </li>
                    <li class="nav-menu-item">
                        <a href="#" class="nav-menu-link">О компании</a>
                    </li><li class="nav-menu-item">
                        <a href="#" class="nav-menu-link">Контаткты</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-item-search">
                <form class="search-form search-input-close">
                    <input id="search" placeholder="Введите название платья или бренда" name="serch" type="text" >
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
                <div class="counter-orders">10</div>
            </li>
        </ul>
    </nav>
</header>
