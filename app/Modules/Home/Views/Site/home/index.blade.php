@extends('layouts.site')
@section('links')

@endsection
@section('content')
    <main>
        <section class="slider-block">
            <div class="main-slider">
                <div class="slider-item">
                    <img src="img/slider1.jpg" alt="">
                </div>
                <div class="slider-item">
                    <img src="img/slider1.jpg" alt="">
                </div>
                <div class="slider-item">
                    <img src="img/slider1.jpg" alt="">
                </div>
            </div>
            <h1 class="slider-title">Новая Коллекция</h1>
        </section>
        <section class="catalog">
            <h2 class="catalog-title">Каталог</h2>
            <ul class="catalog-list">
                <li class="catalog-item" >
                    <a href="#" class="catalog-link" style="background-image: url('img/cat1.jpg')">
                        <span>
                            Свадебные платья
                        </span>
                    </a>
                </li>
                <li class="catalog-item" >
                    <a href="#" class="catalog-link" style="background-image: url('img/cat2.jpg')">
                        <span>
                            Вечерние платья
                        </span>
                    </a>
                </li>
                <li class="catalog-item" >
                    <a href="#" class="catalog-link" style="background-image: url('img/cat3.jpg')">
                        <span>
                           Аксессуары и обувь
                        </span>
                    </a>
                </li>
            </ul>
        </section>
        <section class="promotions">
            <div class="promotions-block">
                <h2 class="promotions-title page-title">Акционные товары</h2>
                <ul class="promotions-list">
                    <li class="promotions-item">
                        <a href="#" class="promotions-link promotions-sticker">
                            <img src="img/item1.jpg" data-old="img/item1.jpg" data-change="img/item4.jpg" alt="" class="promotions-img">
                            <h3 class="promotions-link-title">Verona</h3>
                            <div class="promotion-price">
                                <span class="promotion-new-price">30 000 грн.</span>
                                <span class="promotion-old-price">34 000 грн.</span>
                            </div>
                        </a>
                    </li>
                    <li class="promotions-item">
                        <a href="#" class="promotions-link promotions-sticker">
                            <img src="img/item2.jpg" data-old="img/item2.jpg" data-change="img/item4.jpg" alt="" class="promotions-img">
                            <h3 class="promotions-link-title">Verona1</h3>
                            <div class="promotion-price">
                                <span class="promotion-new-price">30 000 грн.</span>
                                <span class="promotion-old-price">34 000 грн.</span>
                            </div>
                        </a>
                    </li>
                    <li class="promotions-item">
                        <a href="#" class="promotions-link promotions-sticker">
                            <img src="img/item3.jpg" data-old="img/item3.jpg" data-change="img/item4.jpg" alt="" class="promotions-img">
                            <h3 class="promotions-link-title">Verona2</h3>
                            <div class="promotion-price">
                                <span class="promotion-new-price">30 000 грн.</span>
                                <span class="promotion-old-price">34 000 грн.</span>
                            </div>
                        </a>
                    </li>
                    <li class="promotions-item promotions-sticker">
                        <a href="#" class="promotions-link">
                            <img src="img/item3.jpg" data-old="img/item3.jpg" data-change="img/item4.jpg" alt="" class="promotions-img">
                            <h3 class="promotions-link-title">Verona4</h3>
                            <div class="promotion-price">
                                <span class="promotion-new-price">30 000 грн.</span>
                                <span class="promotion-old-price">34 000 грн.</span>
                            </div>
                        </a>
                    </li>
                </ul>
                <button class="btn-show-more">Смотреть еще</button>
            </div>
        </section>
        <section class="advantage">
            <div class="advantage-block">
                <h2 class="advantage-title page-title">Преимущества</h2>
                <ul class="advantage-list">
                    <li class="advantage-item">
                        <img src="img/advant1.png" alt="" class="advantage-img">
                        <span class="advantage-text">Большой ассортимент</span>
                    </li>
                    <li class="advantage-item">
                        <img src="img/advant2.png" alt="" class="advantage-img">
                        <span class="advantage-text">Подгонка платьев по фигуре</span>
                    </li>
                    <li class="advantage-item">
                        <img src="img/advant3.png" alt="" class="advantage-img">
                        <span class="advantage-text">Проведение свадеб под ключ</span>
                    </li>
                    <li class="advantage-item">
                        <img src="img/advant4.png" alt="" class="advantage-img">
                        <span class="advantage-text">Выздные царемонии</span>
                    </li>
                </ul>
            </div>
        </section>
        <section class="brands">
            <div class="brands-block">
                <h2 class="brands-title page-title">Бренды</h2>
                <ul class="brands-list">
                    <li class="brands-item">
                        <img src="img/brand1.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand2.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand3.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand4.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand5.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand6.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand1.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand2.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand3.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand4.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand5.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand6.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand1.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand2.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand3.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand4.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand5.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand6.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand1.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand2.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand3.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand4.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand5.png" alt="" class="brands-img">
                    </li>
                    <li class="brands-item">
                        <img src="img/brand6.png" alt="" class="brands-img">
                    </li>

                </ul>
            </div>
        </section>
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
                <div class="seo-elems seo-first-elem">
                    <img src="img/seo1.jpg" alt="" class="seo-img">
                    <div class="seo-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id et vehicula leo aliquet vivamus. Dignissim feugiat donec et diam elementum, malesuada in dis egestas. Viverra tincidunt id tellus egestas. Vel posuere aenean cras id vel tristique urna. Imperdiet id velit diam, quis viverra. Purus fames eget pulvinar turpis massa orci et. Vitae orci morbi tristique aliquet id. Faucibus semper penatibus diam turpis lacus, sed malesuada nunc facilisis. Mi arcu nulla sed quis. Morbi id ornare et ornare ipsum erat nulla. Urna ultricies neque consectetur mattis. Est scelerisque nec dis curabitur urna ultricies feugiat. Venenatis orci, egestas dolor ut. Elit enim semper mauris pellentesque ac.
                        Porta a eget donec sed elit suspendisse scelerisque pretium. Lectus ut dolor enim porta velit. Fermentum, ac odio aliquam, arcu, gravida. Nulla nisi, amet bibendum etiam turpis sagittis amet netus odio. Fermentum facilisi etiam tellus etiam pulvinar risus at nisl duis. Sapien tortor at tincidunt convallis vitae porta nec. Quis nunc odio mauris sed varius sit. Volutpat massa in elementum orci enim cursus arcu vitae. Ac auctor tempor gravida morbi leo malesuada faucibus sit nisl. Rutrum accumsan volutpat a libero ut arcu. Quis sit nunc consectetur nec. Varius odio a magna lectus dolor non.
                        Ut pulvinar ultrices lorem nam ultricies dui. Pulvinar lobortis lorem vivamus in eros, et amet. Volutpat mattis a, tellus hendrerit laoreet viverra pellentesque. Condimentum tristique velit, aliquam ornare eu quisque vulputate. Morbi imperdiet lacus, lacus aliquam. Non tellus turpis sit quam sit. Nibh pellentesque enim magnis elementum, libero, eget ut sed.
                        Libero tellus, id montes, eget diam cras ullamcorper dui. Nulla scelerisque porta nunc eget consectetur. Rhoncus tempus netus lectus amet lobortis orci donec. Accumsan id vulputate massa, sit at. Nec tempor, egestas phasellus diam condimentum faucibus ac pellentesque. Venenatis mauris dictum pretium mauris, vel augue sed. </div>
                </div>
                <div class="seo-elems seo-first-elem">
                    <div class="seo-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id et vehicula leo aliquet vivamus. Dignissim feugiat donec et diam elementum, malesuada in dis egestas. Viverra tincidunt id tellus egestas. Vel posuere aenean cras id vel tristique urna. Imperdiet id velit diam, quis viverra. Purus fames eget pulvinar turpis massa orci et. Vitae orci morbi tristique aliquet id. Faucibus semper penatibus diam turpis lacus, sed malesuada nunc facilisis. Mi arcu nulla sed quis. Morbi id ornare et ornare ipsum erat nulla. Urna ultricies neque consectetur mattis. Est scelerisque nec dis curabitur urna ultricies feugiat. Venenatis orci, egestas dolor ut. Elit enim semper mauris pellentesque ac.
                        Porta a eget donec sed elit suspendisse scelerisque pretium. Lectus ut dolor enim porta velit. Fermentum, ac odio aliquam, arcu, gravida. Nulla nisi, amet bibendum etiam turpis sagittis amet netus odio. Fermentum facilisi etiam tellus etiam pulvinar risus at nisl duis. Sapien tortor at tincidunt convallis vitae porta nec. Quis nunc odio mauris sed varius sit. Volutpat massa in elementum orci enim cursus arcu vitae. Ac auctor tempor gravida morbi leo malesuada faucibus sit nisl. Rutrum accumsan volutpat a libero ut arcu. Quis sit nunc consectetur nec. Varius odio a magna lectus dolor non.
                        Ut pulvinar ultrices lorem nam ultricies dui. Pulvinar lobortis lorem vivamus in eros, et amet. Volutpat mattis a, tellus hendrerit laoreet viverra pellentesque. Condimentum tristique velit, aliquam ornare eu quisque vulputate. Morbi imperdiet lacus, lacus aliquam. Non tellus turpis sit quam sit. Nibh pellentesque enim magnis elementum, libero, eget ut sed.
                        Libero tellus, id montes, eget diam cras ullamcorper dui. Nulla scelerisque porta nunc eget consectetur. Rhoncus tempus netus lectus amet lobortis orci donec. Accumsan id vulputate massa, sit at. Nec tempor, egestas phasellus diam condimentum faucibus ac pellentesque. Venenatis mauris dictum pretium mauris, vel augue sed. </div>
                    <img src="img/seo2.jpg" alt="" class="seo-img">
                </div>

            </div>
        </section>
    </main>
@endsection

@section('scripts')

@endsection
