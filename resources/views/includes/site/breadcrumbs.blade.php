<section class="bredcrumbs">
    <ul class="bredcrumbs-list">
        <li class="bredcrumbs-item">
            <a href="{{ LaravelLocalization::localizeUrl("/") }}" class="bredcrumbs-link">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                        <path d="M14.0627 18H3.93791C3.00725 18 2.25044 17.2432 2.25044 16.3126V9.75017H0.938015C0.421256 9.75017 0.000488281 9.3294 0.000488281 8.81264C0.000488281 8.56449 0.101835 8.32142 0.278025 8.14524L8.61112 0.156418C8.82864 -0.0521802 9.1721 -0.0521802 9.38962 0.156418L17.7145 8.13617C17.8989 8.32142 18.0001 8.56449 18.0001 8.81264C18.0001 9.3294 17.5795 9.75017 17.0627 9.75017H15.7502V16.3126C15.7502 17.2432 14.9935 18 14.0627 18ZM1.40231 8.62519H2.81293C3.12342 8.62519 3.37542 8.87718 3.37542 9.18768V16.3126C3.37542 16.6231 3.62741 16.8751 3.93791 16.8751H14.0627C14.3732 16.8751 14.6252 16.6231 14.6252 16.3126V9.18768C14.6252 8.87718 14.8772 8.62519 15.1877 8.62519H16.5984L9.0003 1.34209L1.40231 8.62519ZM16.9277 8.94022H16.9351H16.9277Z" fill="black"/>
                    </g>
                    <defs>
                        <clipPath id="clip0">
                            <rect width="18" height="18" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </a>
            <meta itemprop="position" content="1" />
        </li>
        @if($breadcrumbs->parent !== null)
            @php
                $i = 2
            @endphp

            @foreach($breadcrumbs->parent as $key => $parent)

                <li class="bredcrumbs-item">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="bredcrumbs-item">
                    <a href="{{ LaravelLocalization::localizeUrl("$parent->slug") }}" class="bredcrumbs-link">{{ $parent->translate()->title }}</a>
                    <meta itemprop="position" content="{{$i}}" />
                </li>
                @php $i++ @endphp
            @endforeach
        @endif
        <li class="bredcrumbs-item">
            <i class="fas fa-chevron-right"></i>
        </li>
        <li class="bredcrumbs-item">
            <span class="bredcrumbs-link bredcrumbs-current">{{$breadcrumbs->current}}</span>
        </li>
    </ul>
</section>


