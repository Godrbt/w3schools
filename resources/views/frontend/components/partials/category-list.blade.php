<div>
    <h3 class="h4">{{ $category->title }}</h3>
    <ul>
        @foreach ($category->services as $srv)
            @php
                $scategory = $srv->scategories->last();
            @endphp
            @if ($scategory)
                <li>
                    <a class="text-dark {{ request()->url() == route('service.detail', ['category_slug' => $scategory->slug, 'service_slug' => $srv->slug]) ? 'bg-primary text-white px-2 rounded my-2' : '' }}"
                        href="{{ route('service.detail', ['category_slug' => $scategory->slug, 'service_slug' => $srv->slug]) }}">
                        {{ $srv->title }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>

    {{-- Recursive Subcategories --}}
    @if ($category->subcategory->isNotEmpty())
        <ul class="ms-4">
            @foreach ($category->subcategory as $sub)
                @include('frontend.components.partials.category-list', ['category' => $sub])
            @endforeach
        </ul>
    @endif
</div>
