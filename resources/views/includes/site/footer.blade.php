<footer class="footer">
    <div class="footer-top">
        <ul class="footer-catalog-list">
            @foreach($pages as $page)
                <li class="footer-catalog-item">
                    <a href="{{route('page.view', ['slug'=>$page->slug])}}" class="footer-catalog-link">{{$page->translate()->title}}</a>
                </li>
            @endforeach
        </ul>
        <ul class="footer-social-list">
            <li class="footer-social-item">
                <a href="#" class="footer-social-link">
                    @include('svg.instagram-icon')
                </a>
            </li>
            <li class="footer-social-item">
                <a href="#" class="footer-social-link">
                    @include('svg.fb-icon')
                </a>
            </li>
        </ul>
    </div>
    <div class="footer-bottom">
        <div class="copyright">
                <span class="copyright-text">
                    © Все права защищены, 2021. Разработка сайта
                </span>
            <a href="https://site-it.com.ua/" class="copyright-logo">
                <img src="{{asset('site/img/spectr-logo.png')}}" alt="copyright-logo" class="copyright-img">
            </a>
        </div>
    </div>
</footer>
