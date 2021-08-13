@extends('layouts.site')
@section('links')
    <link rel="stylesheet" href="{{asset('site/css/page.css')}}">
@endsection
@section('content')
    <main>
        @include('includes.site.breadcrumbs')
        <section class="content">
            <h1 class="content-title page-title">{{$page->translate()->title}}</h1>
            <div class="contacts-wrapper">
                <div class="contacts-top">
                    <div class="contacts-data">
                        <div class="acceptance-orders-block">
                            <h3 class="contacts-block-title">@lang('main.contacts.acceptance_title')</h3>
                            <div class="acceptance-items">
                                <div class="icon-field">@include('svg.phone')</div>
                                <div class="info-field">
                                    <a href="tel:{{$contacts->phone_1}}" class="info-field-phone">{{$contacts->phone_1}}</a>
                                    <a href="tel:{{$contacts->phone_1}}" class="info-field-phone">{{$contacts->phone_2}}</a>
                                </div>
                            </div>
                            <div class="acceptance-items">
                                <div class="icon-field">@include('svg.email')</div>
                                <div class="info-field">
                                    <a href="mail: {{$contacts->email}}" class="info-field-email">{{$contacts->email}}</a>
                                </div>

                            </div>
                            <div class="acceptance-items">
                                <div class="icon-field">@include('svg.clock')</div>
                                <div class="info-field">
                                    <div class="info-field-working_house">{{$contacts->working_house}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="contacts-social-block">
                            <h3 class="contacts-block-title">@lang('main.contacts.social_title')</h3>
                            <a href="{{$contacts->instagram}}" class="contact-social-icon">@include('svg.instagram')</a>
                            <a href="{{$contacts->fb}}" class="contact-social-icon">@include('svg.fb')</a>
                        </div>
                    </div>
                    <div class="contacts-feedback-top">
                        <h3 class="contacts-block-title">@lang('main.contacts.feedback_title')</h3>
                        <form action="" class="contacts-feedback-form">
                            <div class="contacts-feedback-form-top">
                                <div class="form-block form-block-input">
                                    <label for="feedback-name">@lang('main.contacts.fk_name')</label>
                                    <input type="text" id="feedback-name" name="name">
                                </div>
                                <div class="form-block form-block-input">
                                    <label for="feedback-phone">@lang('main.contacts.fk_phone')</label>
                                    <input type="text" id="feedback-phone" name="phone">
                                </div>
                                <div class="form-block">
                                    <label for="feedback-msg">@lang('main.contacts.fk_msg')</label>
                                    <textarea id="feedback-msg" name="phone"></textarea>
                                </div>
                            </div>
                            <div class="form-block">
                                <button class="contacts-feedback-btn">@lang('main.contacts.fk_btn')</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="contacts-medium">
                    <h2 class="contacts-medium-title">@lang('main.contacts.contacts-medium-title')</h2>
                    <div class="shops-block">
                        @foreach($cities as $city)
                            @if(count($city->shops))
                                <div class="shops-element">
                                    <div class="shops-header">
                                        <h4 class="shops-header-title">{{$city->translate()->title}}</h4>
                                    </div>
                                    <div class="shops-body">
                                        @foreach($city->shops as $shop)
                                       <div class="shops-body-wrap">
                                            <h5 class="shops-body-title">{{$shop->translate()->title}}</h5>
                                            <div class="acceptance-items">
                                                <div class="icon-field">@include('svg.phone')</div>
                                                <div class="info-field">
                                                    <a href="tel:{{$shop->phone}}" class="info-field-phone">{{$shop->phone}}</a>
                                                </div>
                                            </div>
                                            <div class="acceptance-items">
                                                <div class="icon-field">@include('svg.location')</div>
                                                <div class="info-field">
                                                    <div class="info-field-address">{{$shop->translate()->address}}</div>
                                                </div>
                                            </div>
                                            <div class="acceptance-items">
                                                <div class="icon-field">@include('svg.email')</div>
                                                <div class="info-field">
                                                    <a href="mail: {{$shop->email}}" class="info-field-email">{{$shop->email}}</a>
                                                </div>

                                            </div>
                                            <div class="acceptance-items">
                                                <div class="icon-field">@include('svg.clock')</div>
                                                <div class="info-field">
                                                    <div class="info-field-working_house">{{$shop->working_house}}</div>
                                                </div>
                                            </div>
                                       </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

        </section>
        <div class="contacts-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.4408189540536!2d30.516403315959753!3d50.45151547947544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce5a64674e6b%3A0x37d4433f5ab3f50e!2z0L_QtdGALiDQotCw0YDQsNGB0LAg0KjQtdCy0YfQtdC90LrQviwgMTYsINCa0LjQtdCyLCAwMjAwMA!5e0!3m2!1sru!2sua!4v1628859241253!5m2!1sru!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>


    </main>
@endsection

@section('scripts')

@endsection
