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
        @widget('catalog', 1)
        @widget('similar', null)
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
                @widget('fitting-form')
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
