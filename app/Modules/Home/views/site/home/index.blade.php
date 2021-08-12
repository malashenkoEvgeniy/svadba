@extends('layouts.site')
@section('links')

@endsection
@section('content')
    <main>
        <section class="slider-block">
            <div class="main-slider">
                @foreach($slider as $slide)
                    @foreach($slide->attachments as $slide_img)
                        <div class="slider-item">
                            <img src="{{$slide_img->img_f }}" alt="">
                        </div>
                    @endforeach
                @endforeach
            </div>
            <h1 class="slider-title">{{$main_page->translate()->title}}</h1>
        </section>
        @widget('catalog')
        @widget('similar')
        <section class="advantage">
            <div class="advantage-block">
                <h2 class="advantage-title page-title">Преимущества</h2>
                <ul class="advantage-list">
                    <li class="advantage-item">
                        <img src="{{asset('site/img/advant1.png')}}" alt="" class="advantage-img" width="50" height="50">
                        <span class="advantage-text">Большой ассортимент</span>
                    </li>
                    <li class="advantage-item">
                        <img src="{{asset('site/img/advant2.png')}}" alt="" class="advantage-img" width="50" height="50">
                        <span class="advantage-text">Подгонка платьев по фигуре</span>
                    </li>
                    <li class="advantage-item">
                        <img src="{{asset('site/img/advant3.png')}}" alt="" class="advantage-img" width="50" height="50">
                        <span class="advantage-text">Проведение свадеб под ключ</span>
                    </li>
                    <li class="advantage-item">
                        <img src="{{asset('site/img/advant4.png')}}" alt="" class="advantage-img" width="50" height="50">
                        <span class="advantage-text">Выздные царемонии</span>
                    </li>
                </ul>
            </div>
        </section>
        @if(count($brands))
        <section class="brands">
            <div class="brands-block">
                <h2 class="brands-title page-title">Бренды</h2>
                <ul class="brands-list">
                    @for($i = 0; $i<24; $i++)
                    <li class="brands-item">
                        <img src="{{$brands[random_int(0, count($brands)-1)]->attachments[0]->img_d}}" alt="" class="brands-img">
                    </li>
                    @endfor

                </ul>
            </div>
        </section>
        @endif
        <section class="feedback-form">
            <div class="feedback-form-block">
                <h2 class="feedback-form-title page-title">Записаться на примерку</h2>
                <form action="" class="feedback-form-form">
                    <div class="feedback-form-lavel feedback-form-first-lavel">
                        <div class="input-block">
                            <label for="name">Имя<span>*</span></label>
                            <input type="text" id="name">
                        </div>
                        <div class="input-block">
                            <label for="phone">Телефон<span>*</span></label>
                            <input type="text" id="phone">
                        </div>
                    </div>
                    <div class="feedback-form-lavel feedback-form-second-lavel">
                        <div class="input-block">
                            <label for="date">Дата<span>*</span></label>
                            <input type="date" id="date">
                        </div>
                        <div class="input-block">
                            <label for="time-appointment">Время<span>*</span></label>
                            <select type="text" id="time-appointment">
                                <option value="">10:00 - 11:00</option>
                                <option value="">11:00 - 12:00</option>
                                <option value="">12:00 - 13:00</option>
                                <option value="">13:00 - 14:00</option>
                                <option value="">14:00 - 15:00</option>
                                <option value="">15:00 - 16:00</option>
                                <option value="">16:00 - 17:00</option>
                                <option value="">18:00 - 19:00</option>
                                <option value="">19:00 - 20:00</option>
                            </select>
                        </div>
                        <div class="input-block">
                            <label for="address">Адрес салона<span>*</span></label>
                            <select type="text" id="address">
                                <option value="">ул. Шевченко 1</option>
                                <option value="">ул. Шевченко 10</option>
                                <option value="">ул. Шевченко 100</option>
                                <option value="">ул. Шевченко 1000</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-block">
                        <label for="description">Сообщение</label>
                        <textarea type="date" id="description"></textarea>
                    </div>
                    <button class="btn" type="submit">Записаться</button>
                </form>
            </div>
        </section>
        <section class="seo">
            <div class="seo-block">
                {!! $main_page->translate()->body !!}
            </div>
        </section>
    </main>
@endsection

@section('scripts')

@endsection
