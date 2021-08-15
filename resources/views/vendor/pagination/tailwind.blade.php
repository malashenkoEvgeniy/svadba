@if ($paginator->hasPages())
{{--    <nav class="block-pagination" role="navigation" aria-label="{{ __('Pagination Navigation') }}">--}}
{{--        <button class="btn-show-more">Показать еще</button>--}}
{{--        <ul class="pagination-list">--}}
{{--            <li class="pagination-item">--}}
{{--                <a href="#" class="pagination-link active">1</a>--}}
{{--            </li>--}}
{{--            <li class="pagination-item">--}}
{{--                <a href="#" class="pagination-link">2</a>--}}
{{--            </li>--}}
{{--            <li class="pagination-item">--}}
{{--                <a href="#" class="pagination-link">3</a>--}}
{{--            </li>--}}
{{--            <li class="pagination-item">--}}
{{--                ...--}}
{{--            </li>--}}
{{--            <li class="pagination-item">--}}
{{--                <a href="#" class="pagination-link">19</a>--}}
{{--            </li>--}}

{{--        </ul>--}}
{{--    </nav>--}}

@if($paginator->hasMorePages())
<button class="btn-show-more">Показать еще</button>
@endif
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">


        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">


            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="pagination-link active">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="pagination-link" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                </span>
            </div>
        </div>
    </nav>
@endif
